@extends('layouts.master')
@section('header-title', trans('admin.manage-order'))

@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ trans('admin.manage-order') }}</h2>
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
                        @if(session('deleteOrderSuccess'))
                            <div class="alert alert-danger" role="alert">
                                {{session('deleteOrderSuccess')}}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border">{{ trans('admin.user') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.order') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.status') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.created_at') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.total_price') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.option') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="border">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/cart.png') }}" alt="Image order" class="image-user"/>
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $order->user->full_name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-right">
                                            <h5>{{ $order->id }} </h5>
                                        </td>
                                        <td class="border-right">
                                            @switch($order->status)
                                                @case(\App\Models\Order::PENDING)
                                                    <h5 class="text-warning">{{ trans('admin.attribute-order.pending') }} </h5>
                                                @break

                                                @case(\App\Models\Order::CONFIRM)
                                                    <h5 class="text-primay">{{ trans('admin.attribute-order.confirm') }} </h5>
                                                @break

                                                @case(\App\Models\Order::CANCEL)
                                                    <h5 class="text-danger">{{ trans('admin.attribute-order.cancel') }} </h5>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="border-right">
                                            <h5>{{ $order->created_at }} </h5>
                                        </td>
                                        <td  class="border-right">
                                            <h5>{{ number_format($order->total_price, 0, '', ',') }} đ</h5>
                                        </td>
                                        <td class="text-center border">
                                            <a class="pl-1" title="Show"
                                                href="{{ route('orders.show', ['order' => $order->id]) }}">
                                                <i class="fas fa-edit text-primary"></i>
                                            </a>
                                            <a class="pl-1 border-left" title="Remove"
                                                href="{{ route('order.delete', ['id' => $order->id]) }}" >
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
        {!! $orders->links() !!}
    </div>
@endsection
