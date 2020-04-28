@extends('layouts.master')
@section('header-title', $product->name)

@section('main')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{!! @trans('home.product-detail') !!}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section_padding">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text align-items-center">
                        <img src="{{ asset("images/1.png") }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="mb-60">{{ $product->name }}</h4> <hr>
                    <p  class="mb-20">{{ $product->description }}</p> <hr>
                    <div class="price">
                        <span>{{ number_format($product->price, 0, '', ',') }} đ</span> <hr>
                    </div>
                    <span>{{ trans('home.quantity')  }} {{ $product->quantity }}</span> <hr>
                    <div class=" row product-caption align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="button-group-area mt-40">
                                <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="genric-btn success e-large">{{ trans('home.add-to-cart') }}</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 product-ratting mt-50">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star low-star"></i>
                            <i class="far fa-star low-star"></i>
                            <a href="#" class="genric-btn danger e-large ml-20">{{ trans('home.vote') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-50">
                @if ($product->comments->count() > config('setting.comment-minimum'))
                    <h4>{{ trans('home.list-comment') }}</h4>
                    @foreach ($product->comments as $comment)
                        <div class="py-2">
                            <p class="mb-0 text-primary">
                                {{ $comment->user->full_name }} - <span class="text-dark">{{ $comment->created_at }}</span>
                            </p>
                            <p class="mb-0">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mt-5">
                <div class="col-md-12 border border-primary rounded">
                    <form method="POST" action="{{ route('product.comment', ['id' => $product->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label class="mt-3">{{ trans('home.comment') }}</label>
                            <textarea class="form-control mt-3 @error('content') is-invalid @enderror" name="content" id="content" rows="7"></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="genric-btn success mb-3">{{ trans('home.comment') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
