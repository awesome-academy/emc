<?php

namespace Tests\Unit\Models;

use App\Models\Rating;
use App\Models\User;
use App\Models\Product;
use Tests\ModelTestCase;

class RatingTest extends ModelTestCase
{
    public function test_model_config()
    {
    	$this->runConfigurationAssertions(new Rating(), null, [
    		'star',
	        'id_user',
	        'id_product'
    	]);
    }

    public function test_rating_belong_to_user()
    {
    	$m = new Rating();
    	$r = $m->user();

    	$this->assertBelongsToRelation($r, $m, new User(), 'id_user');
    }

    public function test_rating_belong_to_product()
    {
    	$m = new Rating();
    	$r = $m->product();

    	$this->assertBelongsToRelation($r, $m, new Product(), 'id_product');
    }
}
