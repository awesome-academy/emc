@extends('layouts.master')
@section('header-title', trans('home.order-history'))
@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ trans('home.order-history') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ trans('home.stt') }}</th>
                                <th scope="col">{{ trans('home.day-order') }}</th>
                                <th scope="col">{{ trans('home.total') }}</th>
                                <th scope="col" class="text-center">{{ trans('home.status') }}</th>
                                <th scope="col" class="text-center">{{ trans('home.check-order') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <div class="media ml-40">
                                            <p>{{ $order->id }}</p>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <h5>{{ $order->created_at }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($order->total_price, 0, '', ',') }} đ</h5>
                                    </td>
                                    <td class="text-center">
                                        @if ($order->status == \App\Models\Order::PENDING)
                                            <h5>{{ trans('home.confirm') }}</h5>
                                        @else
                                            <h5>{{ trans('home.success') }}</h5>
                                        @endif
                                    </td>
                                    <td  class="text-center">
                                        <a href="{{ route('order.detail', ['id' => $order->id]) }}" class="text-primary">{{ trans('home.show') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($orders->count() <= config('setting.product-minimum'))
            <div class="col-12 text-center">
                <h1 class="mb-100">{{ trans('home.empty_cart') }}</h1>
                <div class="checkout_btn_inner">
                    <a class="btn_1" href="{{ route('home') }}">{{ trans('home.continue-shopping') }}</a>
                </div>
            </div>
        @endif
    </section>
@endsection
