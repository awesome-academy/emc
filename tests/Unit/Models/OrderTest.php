<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\PaymentDetail;
use Tests\ModelTestCase;

class OrderTest extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new Order() , null, [
            'id_user',
            'id_product',
            'total_price',
            'payment_detail_id',
            'status',
        ]);
    }

    public function test_orderdetails_relation()
    {
        $m = new Order();
        $r = $m->orderdetails();
        $this->assertHasManyRelation($r, $m, new OrderDetail(), 'id_order');
    }

    public function test_user_relation()
    {
        $m = new Order();
        $r = $m->user();
        $this->assertBelongsToRelation($r, $m, new User(), 'id_user');
    }

    public function test_order_belong_to_many_product()
    {
        $m = new Order();
        $r = $m->products();

        $this->assertBelongsToManyRelation($r, $m, new Product(), 'order_id', 'product_id');
    }

    public function test_paymentdetail_relation()
    {
        $m = new Order();
        $r = $m->paymentdetail();
        $this->assertHasOneRelation($r, $m, new PaymentDetail(), 'payment_detail_id');
    }
}
