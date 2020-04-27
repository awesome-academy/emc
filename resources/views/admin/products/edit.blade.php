@extends('layouts.master')
@section('header-title', $product->name)

@section('main')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-box">
                    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-title text-center">
                            <h3 class="mb-50 mt-50">{{ trans('admin.update-product') }}</h3>
                            @if (session('updateProductSuccess'))
                                <div class="alert alert-success mb-0 mt-2" role="alert">
                                    {{ session('updateProductSuccess') }}
                                </div>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-capitalize">
                                            {{ trans('validation.attributes.name') }}
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $product->name }}">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description" class="text-capitalize">
                                            {{ trans('validation.attributes.description') }}
                                        </label>
                                        <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                            value="{{ $product->description }}">

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-capitalize">
                                            {{ trans('validation.attributes.price') }}
                                        </label>
                                        <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                                            value="{{ $product->price }}">

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="quantity" class="text-capitalize">
                                            {{ trans('validation.attributes.quantity') }}
                                        </label>
                                        <input type="number" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                                            value="{{ $product->quantity }}">

                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="category">{{ trans('admin.category') }}</label>
                                    <select class="custom-select" name="id_category">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if($product->id_category == $category->id) selected @endif >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('id_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-50">
                                    <label class="text-capitalize">
                                        {{ trans('validation.attributes.image') }}
                                    </label>
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" value="{{ $product->image }}">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="img text-center">
                                        <img class="w-25" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                </div>
                            </div>
                        <div class="form-footer text-center mt-50">
                            <button type="submit" class="genric-btn info">{{ trans('admin.update-product') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
