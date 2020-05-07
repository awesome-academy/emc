<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\User;
use App\Models\Product;
use Tests\ModelTestCase;

class CommentTest extends ModelTestCase
{
    public function test_model_config()
    {
    	$this->runConfigurationAssertions(new Comment(), null, [
    		'content',
	        'user_id',
	        'product_id',
	        'status',
    	]);
    }

    public function test_comment_belong_to_user()
    {
    	$m = new Comment();
    	$r = $m->user();

    	$this->assertBelongsToRelation($r, $m, new User(), 'user_id');
    }

    public function test_comment_belong_to_product()
    {
    	$m = new Comment();
    	$r = $m->product();

    	$this->assertBelongsToRelation($r, $m, new Product, 'product_id');
    }
}
