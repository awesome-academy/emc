@extends('layouts.master')
@section('header-title', trans('home.order'))
@section('main')
<div class="container my-4">
    <section class="checkout_area mt-100">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-6">
                            <div class="order_box">
                                <h2>{{ trans('home.your-order') }}</h2>
                                <ul class="list">
                                    <li class="mb-10">
                                        <span class="text-primary">{{ trans('home.product') }}</span>
                                    </li>
                                    @foreach ($order->orderdetails as $detail)
                                    <li>
                                        <a href="{{ route('product.detail', ['id' => $detail->id]) }}">{{ $detail->name_product }}
                                            <span class="middle"></span>
                                            <span class="last">x{{ $detail->quantity }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">{{ trans('home.total') }}
                                            <span>{{number_format($order->total_price, 0, '', ',') }} đ</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                        <div class="col-lg-6">
                            <div class="order_box">
                                <h2>{{ trans('home.billing-detail') }}</h2>
                                <ul class="list">
                                    <li class="mb-1">
                                        <span class="text-primary">{{ trans('auth.name') }}</span>
                                        <span class="float-right">{{ $paymentDetail->name }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-primary">{{ trans('auth.email') }}</span>
                                        <span class="float-right">{{ $paymentDetail->email }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-primary">{{ trans('auth.phone') }}</span>
                                        <span class="float-right">{{ $paymentDetail->phone }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-primary">{{ trans('auth.address') }}</span>
                                        <span class="float-right">{{ $paymentDetail->address }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-primary">{{ trans('home.order-note') }}</span>
                                        <span class="float-right">{{ $paymentDetail->desc }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-primary">{{ trans('home.total') }}</span>
                                        <span class="float-right">{{number_format($order->total_price, 0, '', ',') }} đ</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-100">
                            <div class="checkout_btn_inner">
                                <a class="btn_1" href="{{ route('home') }}">{{ trans('home.continue-shopping') }}</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
