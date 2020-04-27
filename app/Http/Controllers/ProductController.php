<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id)
    {
        try {
            $product = Product::findOrFail($id);

            return view('products.detail', ['product' => $product]);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function comment(CommentRequest $request, $id)
    {
        $this->middleware('auth');
        try {
            $product = Product::findOrFail($id);
            Comment::create([
                'content' => $request->content,
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'status' => Comment::ACTIVE,
            ]);

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessages());
        }
    }
}
