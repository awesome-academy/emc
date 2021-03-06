@extends('layouts.master')
@section('header-title', $category->name)
@section('main')
    <section class="latest-product-area padding-bottom">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end text-center mt-100">
                <!-- Section Tittle -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="section-tittle mb-30">
                        <h2>{{ $category->name }} {{ @trans('home.title-product') }}</h2>
                    </div>
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-xl-4 col-lg-4 col-md-6 box-product">
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                    <div class="single-product mb-60">
                                        <div class="product-img">
                                            <img src="{{ asset("images/1.png") }}" alt="">
                                            <div class="new-product">
                                                <span>{{ @trans('home.new') }}</span>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <div class="product-ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star low-star"></i>
                                                <i class="far fa-star low-star"></i>
                                            </div>
                                            <h4><p>{{ $product->name }}</p></h4>
                                            <div class="price text-dark">
                                                <span>{{ number_format($product->price, 0, '', ',') }} đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 d-flex justify-content-center">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
