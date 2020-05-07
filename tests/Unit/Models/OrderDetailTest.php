<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\OrderDetail;
use Tests\ModelTestCase;

class OrderDetailTest extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new OrderDetail() , null, [
            'id_order',
            'id_product',
            'name_product',
            'quantity',
        ]);
    }

    public function test_order_detail_belong_to_category()
    {
        $m = new OrderDetail();
        $r = $m->order();

        $this->assertBelongsToRelation($r, $m, new Order(), 'id_order');
    }
}
