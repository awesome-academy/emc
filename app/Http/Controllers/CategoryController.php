<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /*
    * Show products by category
    */
    public function detail($id)
    {
        try {
            $category = Category::findOrFail($id);
            $paginate = config('setting.paginate');
            $arr_child = [];
            $products = $this->productRepo->getByCategoryId($id, $category, $paginate);

            return view('categories.detail', ['category' => $category, 'products' => $products]);
        } catch(ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
