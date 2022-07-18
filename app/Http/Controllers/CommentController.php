<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Product $product)
    {
        request()->validate([
            'name' => 'required'
        ]);
        Comment::create([
            'name' => request('name'),
            'product_id' => $product->id,
            'user_id' => request()->user()->id
        ]);
        return redirect()->back();
    }

    public function edit(Comment $comment)
    {

        return view('comments.edit', [
            'comment' => $comment,
            'count' => Cart::countproducts(Auth::user())
        ]);
    }

    public function update(Product $product, Comment $comment)
    {
        $comment->update([
            'name' => request('name')
        ]);
        return redirect()->route('products.show', [
            'product' => $product
        ])->with('message', 'Comment has been edited');
    }

    public function delete($comment)
    {
        Comment::destroy($comment);
        return redirect()->back()->with('message', 'Comment removed');
    }
}
