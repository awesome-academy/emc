@extends('layouts.master')
@section('header-title', trans('admin.header-title'))
@section('main')
    <section class="latest-product-area">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end text-center mt-100">
                <!-- Section Tittle -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="section-tittle mb-30">
                        <h3>{{ @trans('admin.statistical') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="whole-wrap">
        <div class="container box_1170">
            <div class="section-top-border">
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial">&num;</div>
                            <div class="country">{{ trans('admin.directory') }}</div>
                            <div class="country">{{ trans('admin.total') }}</div>
                            <div class="country">{{ trans('admin.option') }}</div>
                        </div>
                        <div class="table-row">
                            <div class="serial">&#9658;</div>
                            <div class="country">{{ trans('admin.user') }}</div>
                            <div class="country">{{ $userTotal }}</div>
                            <div class="country">
                                <a class="genric-btn info" href="{{ route('admin.user.index') }}"><i class="fas fa-bars"></i></a>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="serial">&#9658;</div>
                            <div class="country">{{ trans('admin.product') }}</div>
                            <div class="country">{{ $productTotal }}</div>
                            <div class="country">
                                <a class="genric-btn info" href="#"><i class="fas fa-bars"></i></a>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="serial">&#9658;</div>
                            <div class="country">{{ trans('admin.order') }}</div>
                            <div class="country">{{ $orderTotal }}</div>
                            <div class="country">
                                <a class="genric-btn info" href="#"><i class="fas fa-bars"></i></a>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="serial">&#9658;</div>
                            <div class="country">{{ trans('admin.comment') }}</div>
                            <div class="country">{{ $suggestProDuctTotal }}</div>
                            <div class="country">
                                <a class="genric-btn info" href="#"><i class="fas fa-bars"></i></a>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="serial">&#9658;</div>
                            <div class="country">{{ trans('admin.suggest') }}</div>
                            <div class="country">{{ $commentTotal }}</div>
                            <div class="country">
                                <a class="genric-btn info" href="#"><i class="fas fa-bars"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
