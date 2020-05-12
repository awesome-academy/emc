<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(ProductRepositoryInterface $productRepo,CategoryRepositoryInterface $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    /*
    * Show products by category
    */
    public function detail($id)
    {
        try {
            $category = $this->categoryRepo->findOrFail($id);
            $paginate = config('setting.paginate');
            $arr_child = [];
            $products = $this->productRepo->getByCategoryId($id, $category, $paginate);

            return view('categories.detail', ['category' => $category, 'products' => $products]);
        } catch(ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
