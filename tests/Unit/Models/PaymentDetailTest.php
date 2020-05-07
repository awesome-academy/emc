<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\PaymentDetail;
use Tests\ModelTestCase;

class PaymentDetailTest extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new PaymentDetail() , 'payment_details', [
            'name',
            'phone',
            'address',
            'email',
            'desc',
        ]);
    }

    public function test_payment_detail_belong_to_category()
    {
        $m = new PaymentDetail();
        $r = $m->order();

        $this->assertBelongsToRelation($r, $m, new Order(), 'order_id');
    }
}
