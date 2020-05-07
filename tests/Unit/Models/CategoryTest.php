<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Product;
use Tests\ModelTestCase;

class CategoryTest extends ModelTestCase
{
	public function test_model_config()
	{
		$this->runConfigurationAssertions(new Category(), 'categories',[
			'parent_id',
        	'name',
		]);
	}

	public function test_category_has_many_product()
	{
		$m = new Category();
		$r = $m->products();

		$this->assertHasManyRelation($r, $m, new Product());
	}

	public function test_category_has_many_children()
	{
		$m = new Category();
		$r = $m->children();

		$this->assertHasManyRelation($r, $m, new Category(), 'parent_id');
	}
}
