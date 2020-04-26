<h2>Hi {{ Auth::user()->full_name }}</h2>
<p>
	<b>{{ trans('mail.order-success') }}</b>
</p>

<h4>{{ @trans('home.product-detail') }}:</h4>

<table border="1" cellpadding="0" cellpadding="10" width="400">
	@if(session()->has('cart'))
        <thead>
            <tr>
                <th>{{ trans('home.product') }}</th>
                <th>{{ trans('home.price') }}</th>
                <th>{{ trans('home.quantity-cart') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        <div class="media">
                            <div class="d-flex">
                                <img src="{{ asset('images/1.png') }}" alt="Image Product" />
                            </div>
	                        <div class="media-body">
	                            <p>{{ $item['item']->name }}</p>
	                        </div>
                    	</div>
                    </td>
                    <td>
                        <h5>{{ number_format($item['item']->price, 0, '', ',') }} đ</h5>
                    </td>
                    <td>
                        <h5>{{ $item['qty'] }}</h5>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <h4>{{ @trans('home.total')}}</h4>
                </td>
                <td>
                    <h5>{{ number_format($totalPrice, 0, '', ',') }} đ</h5>
                </td>
            </tr>
        </tbody>
	@endif
</table>