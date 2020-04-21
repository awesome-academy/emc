@extends('layouts.master')
@section('header-title', trans('home.order'))
@section('main')

    <section class="checkout_area mt-100">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    @if(session()->has('cart'))
                        <div class="col-lg-7 order_box">
                            <h3>{{ trans('home.billing-detail') }}</h3>
                            <form class="row contact_form" action="{{ route('order.create') }}" method="POST">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <label for="full_name" class="text-capitalize mr-1">{{ @trans('auth.fullname') }}</label>

                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->full_name }}" />
                                    @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="full_name" class="text-capitalize mr-1">{{ @trans('auth.phone') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="full_name" class="text-capitalize mr-1">{{ @trans('auth.email') }}</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="full_name" class="text-capitalize mr-1">{{ @trans('auth.address') }}</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>{{ trans('home.order-note') }}</h3>
                                    </div>
                                    <textarea class="form-control" name="desc" id="desc" rows="1"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn_3 float-right" type="submit">{{ trans('home.confirm-order') }}</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="col-lg-5">
                        @if(session()->has('cart'))
                            <div class="order_box">
                                <h2>{{ trans('home.your-order') }}</h2>
                                <ul class="list">
                                    <li class="mb-10">
                                        <span class="text-primary">{{ trans('home.product') }}</span>
                                        <span class="float-right text-primary">{{ trans('home.total') }}</span>
                                    </li>
                                    @foreach($products as $product)
                                    <li>
                                        <a href="{{ route('product.detail', ['id' => $product['item']->id]) }}">{{ $product['item']->name }}
                                            <span class="middle">x{{ $product['qty'] }}</span>
                                            <span class="last">{{ number_format($product['item']->price, 0, '', ',') }} đ</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">{{ trans('home.total') }}
                                            <span>{{ number_format($totalPrice, 0, '', ',') }} đ</span>
                                        </a>
                                    </li>
                                </ul>
                                <a class="btn_3" href="{{ route('cart.index') }}">{{ trans('home.edit-cart') }}</a>
                            </div>
                        @endif
                    </div>
                    @if(isset($orderConfirm))
                        <div class="col-xl-12 mb-50">
                            <div class="hero-cap text-center">
                                <h2>{{ $orderConfirm }}</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="order_box">
                                <h2>{{ trans('home.your-order') }}</h2>
                                <ul class="list">
                                    <li>
                                        <span class="text-primary">{{ trans('auth.name') }}</span>
                                        <span class="float-right">{{ $payment_detail->name }}</span>
                                    </li>
                                    <li>
                                        <span class="text-primary">{{ trans('auth.email') }}</span>
                                        <span class="float-right">{{ $payment_detail->email }}</span>
                                    </li>
                                    <li>
                                        <span class="text-primary">{{ trans('auth.phone') }}</span>
                                        <span class="float-right">{{ $payment_detail->phone }}</span>
                                    </li>
                                    <li>
                                        <span class="text-primary">{{ trans('auth.address') }}</span>
                                        <span class="float-right">{{ $payment_detail->address }}</span>
                                    </li>
                                    <li>
                                        <span class="text-primary">{{ trans('home.order-note') }}</span>
                                        <span class="float-right">{{ $payment_detail->desc }}</span>
                                    </li>
                                    <li>
                                        <span class="text-primary">{{ trans('home.total') }}</span>
                                        <span class="float-right">{{number_format($order->total_price, 0, '', ',') }} đ</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout_btn_inner float-right">
                                <a class="btn_1" href="{{ route('home') }}">{{ trans('home.continue-shopping') }}</a>
                            </div>
                        </div>
                    @elseif(!session()->has('cart') && !isset($orderConfirm))
                        <div class="col-12 text-center">
                            <h1 class="mb-100">{{ trans('home.empty_cart') }}</h1>
                            <div class="checkout_btn_inner">
                                <a class="btn_1" href="{{ route('home') }}">{{ trans('home.continue-shopping') }}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
