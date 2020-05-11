<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $take = config('setting.take-product');
        $productHots = $this->productRepo->orderBy('created_at', 'ASC')->take($take);

        return view('home', ['productHots' => $productHots]);
    }
}
