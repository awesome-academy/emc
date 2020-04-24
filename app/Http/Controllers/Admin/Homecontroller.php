<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Comment;
use App\Models\SuggestProduct;

class Homecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $orderTotal = Order::pluck('id')->count();
        $userTotal = User::pluck('id')->count();
        $productTotal = Product::pluck('id')->count();
        $suggestProDuctTotal = SuggestProduct::pluck('id')->count();
        $commentTotal = Comment::pluck('id')->count();

        return view('admin.home.index', [
            'orderTotal' => $orderTotal,
            'userTotal' => $userTotal,
            'productTotal' => $productTotal,
            'suggestProDuctTotal' => $suggestProDuctTotal,
            'commentTotal' => $commentTotal,
        ]);
    }
}
