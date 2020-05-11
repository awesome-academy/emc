<?php 

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
	public function getModel()
	{
		return Product::class;
	}

	public function getByCategoryId($id, $category, $paginate)
	{
		$arr_child = [];

        if (sizeof($category->children) > 0) {
            foreach ($category->children as $children) {
                array_push($arr_child, $children->id);
            }
            return Product::whereIn('id_category', $arr_child)->paginate($paginate);
        } else {
            return Product::where('id_category', '=', $id)->paginate($paginate);
        }
	}
}