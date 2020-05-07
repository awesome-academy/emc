<?php

namespace Tests\Unit\Models;

use App\Models\SuggestProduct;
use App\Models\User;
use Tests\ModelTestCase;

class SuggestProductTest extends ModelTestCase
{
    public function test_model_config()
    {
    	$this->runConfigurationAssertions(new SuggestProduct, 'suggest_products', [
    		'name_product',
	        'image',
	        'description',
	        'status',
	        'id_user',
    	]);
    }

    public function test_rating_belong_to_user()
    {
    	$m = new SuggestProduct();
    	$r = $m->user();

    	$this->assertBelongsToRelation($r, $m, new User(), 'id_user');
    }
}
