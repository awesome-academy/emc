<?php 

namespace App\Repositories\PaymentDetail;

use App\Models\PaymentDetail;
use App\Repositories\BaseRepository;

class PaymentDetailRepository extends BaseRepository implements PaymentDetailRepositoryInterface
{
	public function getModel()
	{
		return PaymentDetail::class;
	}
}