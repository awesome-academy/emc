<?php 

namespace App\Repositories\SuggestProduct;

use App\Models\SuggestProduct;
use App\Repositories\BaseRepository;

class SuggestProductRepository extends BaseRepository implements SuggestProductRepositoryInterface
{
	public function getModel()
	{
		return SuggestProduct::class;
	}
}