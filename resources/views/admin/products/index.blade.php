@extends('layouts.master')
@section('header-title', trans('admin.manage-product'))

@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ trans('admin.manage-product') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="row">
                    <div class="col-md-3 float-left">
                        <form action="{{ route('products.index') }}" method="GET" class="d-flex mb-3">
                            <input type="text" name="key" id="input" class="form-control" value="" placeholder="Search Name Product...">
                            <button type="submit" class="text-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <a href="{{ route('products.create') }}" class="genric-btn info float-right">
                            {{ trans('admin.add-product') }}
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                        @if(session('deleteProductSuccess'))
                            <div class="alert alert-danger" role="alert">
                                {{session('deleteProductSuccess')}}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border">{{ trans('admin.product') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.price') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.quantity') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.category') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.description') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.option') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="border">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset($product->image) }}" alt="Image product" class="image-product"/>
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $product->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-right">
                                            <h5 class="wrap">{{ number_format($product->price, 0, '', ',') }} đ</h5>
                                        </td>
                                        <td class="border-right text-center">
                                            <h5>{{ $product->quantity }} </h5>
                                        </td>
                                        <td  class="border-right">
                                            <h5>{{ $product->category->name }} </h5>
                                        </td>
                                        <td  class="border-right">
                                            <h5>{{ $product->description }} </h5>
                                        </td>
                                        <td class="text-center border">
                                            <a class="pl-1" title="Edit"
                                                href="{{ route('products.edit', ['product' => $product->id]) }}">
                                                <i class="fas fa-edit text-primary"></i>
                                            </a>
                                            <a class="pl-1 border-left" title="Remove"
                                                href="{{ route('admin.products.delete', ['id' => $product->id]) }}" >
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
@endsection
