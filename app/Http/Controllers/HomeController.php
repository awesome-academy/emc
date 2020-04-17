<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $take = config('setting.take-product');
        $productHots = Product::orderBy('created_at', 'ASC')->take($take)->get();

        return view('home', ['productHots' => $productHots]);
    }
}
