<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


class ProductController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $products = Product::inRandomOrder()->limit(9)->get();
            $count = Cart::countproducts(Auth::user());
            return view('welcome', compact('products', 'count'));
        } else {
            $products = Product::inRandomOrder()->limit(9)->get();
            return view('welcome', compact('products'));
        }
    }


    public function dashboard()
    {
        if (Auth::user()->user_type == '1') {
            return view('dashboard', [
                'products' => Product::all()
            ]);
        } else {
            return redirect()->route('welcome');
        }
    }


    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => ImageController::getImage()
        ]);

        $product->save();

        $product->categories()->attach(request()->category);

        $tags = explode(', ', request()->tags);
        foreach ($tags as $key => $tagName) {
            DB::table('tags')->updateOrInsert([
                'name' => $tagName
            ]);
            $tag = Tag::where(['name' => $tagName])->first();

            DB::table('product_tag')->insert([
                'product_id' => $product->id,
                'tag_id' => $tag->id
            ]);
        }
        return back()->with(['addedProduct' => 'Product added successfully']);
    }

    public function show($productId)
    {

        $product = Product::with('categories', 'tags')->find($productId);
        if ($product != null) {
            $tags = $product->tags;
            $tagIds = $tags->pluck('id');
            $postsIds = DB::table('products')
                ->select(DB::raw('DISTINCT(products.id)'))
                ->join('product_tag', 'products.id', '=', 'product_tag.product_id')
                ->whereIn('product_tag.tag_id', $tagIds)
                ->whereNotIn('product_tag.product_id', [$product->id])
                ->get();
            $products = Product::whereIn('id', $postsIds->pluck('id'))->limit(3)->get();
            $user = auth()->user();
            $count = Cart::countproducts($user);
            return view('products.product', compact(
                'product', 'count', 'products'
            ));
        } else {
            return abort(404);
        }
    }

    public function edit($product)
    {
        return view('products.edit', [
            'product' => Product::find($product),
            'categories' => Category::all(),
        ]);
    }

    public function update(Product $product)
    {
        $product->update([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => ImageController::getImage()
        ]);

        return redirect()->route('admin.products')->with('updated', 'Product updated successfully');
    }

    public function destroy($product)
    {
        Product::destroy($product);
        return back()->with('deleted', 'Product deleted');
    }
}
