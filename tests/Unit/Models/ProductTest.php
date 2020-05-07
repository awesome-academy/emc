<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Order;
use Tests\ModelTestCase;

class ProductTest extends ModelTestCase
{

    public function test_model_config()
    {
    	$this->runConfigurationAssertions(new Product(), null, [
    		'name',
	        'description',
	        'price',
	        'quantity',
	        'image',
	        'id_category',
    	]);
    }

    public function test_product_has_many_comment()
    {
    	$m = new Product();
    	$r = $m->comments();

    	$this->assertHasManyRelation($r, $m, new Comment());
    }

    public function test_product_has_many_rating()
    {
    	$m = new Product();
    	$r = $m->ratings();

    	$this->assertHasManyRelation($r, $m, new Rating());
    }

    public function test_product_belong_to_category()
    {
    	$m = new Product();
    	$r = $m->category();

    	$this->assertBelongsToRelation($r, $m, new Category(), 'id_category');
    }

    public function test_product_belong_to_many_order()
    {
    	$m = new Product();
    	$r = $m->orders();

    	$this->assertBelongsToManyRelation($r, $m, new Order(), 'product_id', 'order_id');
    }
}
