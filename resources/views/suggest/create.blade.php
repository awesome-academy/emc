@extends('layouts.master')
@section('header-title', trans('home.suggest-product'))
@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            @if(session('suggest_success'))
                                <h3>{{ session('suggest_success') }}</h3>
                            @else
                                <h2>{{ trans('home.suggest-product') }}</h2>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('suggest.store') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{ trans('home.name-product') }}</label>
                        <input type="text" class="form-control @error('name_product') is-invalid @enderror" id="name_product" name="name_product">

                        @error('name_product')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="7"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ trans('home.image-product') }}</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    <button type="submit" class="btn btn-primary mt-5">{{ trans('home.suggest') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
