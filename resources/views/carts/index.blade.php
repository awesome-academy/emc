@extends('layouts.master')
@section('header-title', trans('home.cart'))

@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ trans('home.title-cart') }}</h2>
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
                    @if(session('out_of_product'))
                        <div class="alert alert-danger" role="alert">
                            {{session('out_of_product')}}
                        </div>
                    @endif

                    @if(session()->has('cart'))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ trans('home.product') }}</th>
                                    <th scope="col">{{ trans('home.price') }}</th>
                                    <th scope="col">{{ trans('home.quantity-cart') }}</th>
                                    <th scope="col" class="text-center">{{ trans('home.remove') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/1.png') }}" alt="Image Product" />
                                                </div>
                                            <div class="media-body">
                                                <p>{{ $product['item']->name }}</p>
                                            </div>
                                        </div>
                                        </td>
                                        <td>
                                            <h5>{{ number_format($product['item']->price, 0, '', ',') }} đ</h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input class="input-number" type="text" disabled value={{ $product['qty'] }} >
                                                <a href="{{ route('cart.reduce', ['id' => $product['item']->id]) }}">
                                                   <span class="input-number-decrement"><i class="fas fa-minus"></i></span>
                                                </a>
                                                <a href="{{ route('cart.increase', ['id' => $product['item']->id]) }}">
                                                    <span class="input-number-increment"><i class="fas fa-plus"></i></span>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('cart.remove', ['id' => $product['item']->id]) }}">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h4>{{ @trans('home.total')}}</h4>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($totalPrice, 0, '', ',') }} đ</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="{{ route('home') }}">{{ trans('home.continue-shopping') }}</a>
                    <a class="btn_1 checkout_btn_1" href="{{ route('order.index') }}">{{ trans('home.order') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
