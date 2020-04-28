@extends('layouts.master')
@section('header-title', trans('admin.create-product'))

@section('main')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-box">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-title text-center">
                            <h3 class="mb-50 mt-50">{{ trans('admin.create-product') }}</h3>
                            @if (session('createProductSuccess'))
                                <div class="alert alert-success mb-0 mt-2" role="alert">
                                    {{ session('createProductSuccess') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-capitalize">
                                            {{ trans('admin.input-attri', ['attribute' => trans('validation.attributes.name')]) }}
                                        </label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-capitalize">
                                            {{ trans('admin.input-attri', ['attribute' => trans('validation.attributes.description')]) }}
                                        </label>
                                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                            value="{{  old('description') }}">

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
                                            {{ trans('admin.input-attri', ['attribute' => trans('validation.attributes.price')]) }}
                                        </label>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}">

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-capitalize">
                                            {{ trans('admin.input-attri', ['attribute' => trans('validation.attributes.quantity')]) }}
                                        </label>
                                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{ old('quantity') }}">

                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>{{ trans('admin.category') }}</label>

                                    <select class="custom-select @error('id_category') is-invalid @enderror" name="id_category">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category'))
                                                    @if (old('category') == $category->id) selected @endif
                                                @endif
                                            >
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
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-center mt-50">
                            <button type="submit" class="genric-btn info">{{ trans('admin.create-product') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
