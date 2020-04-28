@extends('layouts.master')
@section('header-title', trans('admin.manage-suggest'))

@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ trans('admin.manage-suggest') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                        @if(session('confirmSuccess'))
                            <div class="alert alert-success" role="alert">
                                {{session('confirmSuccess')}}
                            </div>
                        @elseif(session('deleteSuggestSuccess'))
                            <div class="alert alert-danger" role="alert">
                                {{session('deleteSuggestSuccess')}}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border">{{ trans('admin.user') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.product') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.image') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.status') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.created_at') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.description') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.option') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($suggests as $suggest)
                                    <tr>
                                        <td class="border">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/2.png') }}" alt="Image user" class="image-user"/>
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $suggest->user->full_name }}</p>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="border-right">
                                            <h5>{{ $suggest->name_product }} </h5>
                                        </td>
                                        <td class="border-right">
                                            <img src="{{ asset($suggest->image) }}" alt="Image Product" class="image-user"/>
                                        </td>
                                        <td class="border-right">
                                            @if($suggest->status == \App\Models\SuggestProduct::UNCONFIRM)
                                                <h5 class="text-dark">{{ trans('admin.attribute-suggest.unconfirm') }}</h5>
                                            @else
                                                <h5 class="text-primary">{{ trans('admin.attribute-suggest.confirm') }}</h5>
                                            @endif
                                        </td>
                                        <td  class="border-right">
                                            <h5>{{ $suggest->created_at }} </h5>
                                        </td>
                                        <td class="border-right">
                                            <h5>{{ $suggest->description }} </h5>
                                        </td>
                                        <td class="border">
                                            <a class="pl-1" title="Confirm"
                                                href="{{ route('admin.suggest.confirm', ['id' => $suggest->id]) }}">
                                                <i class="fas fa-check text-primary"></i>
                                            </a>
                                            <a class="pl-1 border-left" title="Remove"
                                                href="{{ route('admin.suggest.delete', ['id' => $suggest->id]) }}" >
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
        {!! $suggests->links() !!}
    </div>
@endsection
