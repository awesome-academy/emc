<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    /*
    * Show products by category
    */
    public function detail($id)
    {
        try {
            $category = Category::findOrFail($id);
            $arr_child = [];
            $paginate = config('setting.paginate');

            if (sizeof($category->children) > 0) {
                foreach ($category->children as $children) {
                    array_push($arr_child, $children->id);
                }
                $products = Product::whereIn('id_category', $arr_child)->paginate($paginate);
            } else {
                $products = Product::where('id_category', '=', $id)->paginate($paginate);
            }

            return view('categories.detail', ['category' => $category, 'products' => $products]);
        } catch(ModelNotFoundException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
