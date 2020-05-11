<?php 

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
	/**
	*@return mixed 
	*/
	public function getByCategoryId($id, $category, $paginate);
}