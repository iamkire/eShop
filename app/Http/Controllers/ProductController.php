<?php

namespace App\Http\Controllers;

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

    public function index(Request $request)
    {

        if (Auth::check() && Auth::user()->user_type == 0) {

            $products = Product::inRandomOrder()->limit(3)->get();
            $user = auth()->user();
            $count = Cart::where('email', $user->email)->count();
            return view('welcome', compact(
                'products',
                'count',

            ));
        }
        else{
            $products = Product::inRandomOrder()->limit(3)->get();
            return view('welcome',compact('products'));
        }
    }


    public function dashboard()
    {
        $type = Auth::user()->user_type;
        if ($type == '1') {
            return view('dashboard', [
                'products' => Product::all()
            ]);
        } else {
            return redirect()->route('welcome');
        }
    }


    public function create()
    {
        return view('products.create',[
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);


        $product = new Product();
            $product->title = $request->title;
            $product->excerpt = $request->excerpt;
            $product->description = $request->description;
            $product->price = $request->price;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName= time().'.'.$extension;

            $file->move('images',$fileName);
            $product->image = $fileName;
        }
        $product->save();
        $product->categories()->attach($request->category);
        $tags = explode(', ', $request->tags);
        foreach($tags as $key => $tagName){
            DB::table('tags')->updateOrInsert([
                'name' => $tagName
            ]);
            $tag = Tag::where(['name' => $tagName])->first();

            DB::table('product_tag')->insert([
                'product_id' => $product->id,
                'tag_id' => $tag->id
            ]);
        }
        return redirect('dashboard');
    }



    public function show($productId)
    {
        $product = Product::with('categories','tags')->find($productId);
        $categories = Category::all();
        $tags = $product->tags;
        $tagIds = $tags->pluck('id');
        $postsIds = DB::table('products')
            ->select(DB::raw('DISTINCT(products.id)'))
            ->join('product_tag','products.id','=', 'product_tag.product_id')
            ->whereIn('product_tag.tag_id',$tagIds)
            ->whereNotIn('product_tag.product_id',[$product->id])
            ->get();
        $products = Product::whereIn('id',$postsIds->pluck('id'))->limit(3)->get();


        $user = auth()->user();
        $count = Cart::where('email', $user->email)->count();
        return view('products.product', compact(
            'product',
            'count',
        'categories',
        'products'));
    }

    public function edit($product)
    {
        return view('products.edit',[
           'product' => Product::find($product),
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request,Product $product)
    {
        $product->title = $request->title;
        $product->excerpt = $request->excerpt;
        $product->description = $request->description;
        $product->price = $request->price;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('images', $fileName);
            $product->image = $fileName;
            $product->categories->first()->pivot->created_at;
            $product->categories()->updateExistingPivot('category_id',$request->category);
            $product->save();
        }

        return redirect('dashboard');
    }
    public function destroy($product)
    {
        Product::destroy($product);
        return back();
    }
}
