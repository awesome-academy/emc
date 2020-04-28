@extends('layouts.master')
@section('header-title', trans('admin.order')  . $order->id )

@section('main')
<div class="container my-4">
    <section class="checkout_area mt-100">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-6">
                            <div class="order_box">
                                <h2>{{  trans('admin.order') . $order->id }}</h2>

                                <ul class="list">
                                    <li class="mb-10">
                                        <span class="text-primary">{{ trans('admin.product') }}</span>
                                    </li>
                                    @foreach($order->orderdetails as $orderdetail)
                                    <li>
                                        <a href="{{ route('product.detail', ['id' => $orderdetail->id_product]) }}">{{ $orderdetail->name_product }}
                                            <span class="middle"></span>
                                            <span class="last">x{{ $orderdetail->quantity }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">{{ trans('home.total') }}
                                            <span>{{number_format($order->total_price, 0, '', ',') }} đ</span>
                                        </a>
                                    </li>
                                </ul>
                                <ulul class="list list_2">
                                    <span class="text-capitalize mr-5">{{ trans('admin.status') }} : </span>
                                    @switch($order->status)
                                        @case(\App\Models\Order::PENDING)
                                            <span class="float-right badge badge-warning text-white p-2">{{ trans('admin.attribute-order.pending') }}</span>
                                        @break

                                        @case(\App\Models\Order::CONFIRM)
                                            <span class="float-right badge badge-primary p-2">{{ trans('admin.attribute-order.confirm') }}</span>
                                        @break

                                        @case(\App\Models\Order::CANCEL)
                                            <span class="float-right badge badge-danger p-2">{{ trans('admin.attribute-order.cancel') }}</span>
                                        @break
                                    @endswitch
                                </ul>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="order_box">
                            <h2>{{ trans('home.billing-detail') }}</h2>
                            <ul class="list">
                                <li class="mb-1">
                                    <span class="text-primary">{{ trans('auth.name') }}</span>
                                    <span class="float-right">{{ $order->paymentDetail->name }}</span>
                                </li>
                                <li class="mb-1">
                                    <span class="text-primary">{{ trans('auth.email') }}</span>
                                    <span class="float-right">{{ $order->paymentDetail->email }}</span>
                                </li>
                                <li class="mb-1">
                                    <span class="text-primary">{{ trans('auth.phone') }}</span>
                                    <span class="float-right">{{ $order->paymentDetail->phone }}</span>
                                </li>
                                <li class="mb-1">
                                    <span class="text-primary">{{ trans('auth.address') }}</span>
                                    <span class="float-right">{{ $order->paymentDetail->address }}</span>
                                </li>
                                <li class="mb-1">
                                    <span class="text-primary">{{ trans('home.order-note') }}</span>
                                    <span class="float-right">{{ $order->paymentDetail->desc }}</span>
                                </li>
                                <li class="mb-1">
                                    <span class="text-primary">{{ trans('home.total') }}</span>
                                    <span class="float-right">{{number_format($order->total_price, 0, '', ',') }} đ</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-100">
                        <div>
                            @switch($order->status)
                                @case(\App\Models\Order::PENDING)
                                    <a href="{{ route('admin.order.change-confirm', ['id' => $order->id]) }}"
                                        class="genric-btn info">
                                        <i class="fas fa-check"></i> &nbsp;
                                        {{ trans('admin.attribute-order.confirm') }}
                                    </a>
                                    <a href="{{ route('admin.order.change-cancel', ['id' => $order->id]) }}"
                                        class="genric-btn danger">
                                        <i class="fas fa-window-close"></i> &nbsp;
                                        {{ trans('admin.attribute-order.cancel') }}
                                    </a>
                                @break

                                @case(\App\Models\Order::CONFIRM)
                                    <a href="{{ route('admin.order.change-pending', ['id' => $order->id]) }}"
                                        class="genric-btn warning">
                                        <i class="fas fa-spinner"></i> &nbsp;
                                        {{ trans('admin.attribute-order.pending') }}
                                    </a>
                                    <a href="{{ route('admin.order.change-cancel', ['id' => $order->id]) }}"
                                        class="genric-btn danger">
                                        <i class="fas fa-window-close"></i> &nbsp;
                                        {{ trans('admin.attribute-order.cancel') }}
                                    </a>
                                @break

                                @case(\App\Models\Order::CANCEL)
                                    <a href="{{ route('admin.order.change-confirm', ['id' => $order->id]) }}"
                                        class="genric-btn info">
                                        <i class="fas fa-check"></i> &nbsp;
                                        {{ trans('admin.attribute-order.confirm') }}
                                    </a>
                                    <a href="{{ route('admin.order.change-pending', ['id' => $order->id]) }}"
                                        class="genric-btn warning">
                                        <i class="fas fa-spinner"></i> &nbsp;
                                        {{ trans('admin.attribute-order.pending') }}
                                    </a>
                                @break
                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
