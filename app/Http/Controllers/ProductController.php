<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Http\Requests\CommentRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    protected $productRepo;
    protected $commentRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CommentRepositoryInterface $commentRepo)
    {
        $this->middleware('auth')->only(['comment']);        
        $this->productRepo = $productRepo;
        $this->commentRepo = $commentRepo;
    }

    public function detail($id)
    {
        try {
            $product = $this->productRepo->findOrFail($id);

            return view('products.detail', ['product' => $product]);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function comment(CommentRequest $request, $id)
    {
        try {
            $this->productRepo->findOrFail($id);
            $comment = [
                'content' => $request->content,
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'status' => Comment::ACTIVE,
            ];
            $this->commentRepo->create($comment);
            
            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessages());
        }
    }
}
