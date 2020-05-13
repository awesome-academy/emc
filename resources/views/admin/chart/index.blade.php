@extends('layouts.master')
@section('header-title', trans('admin.chart'))

@section('main')
    <div class="container">
        <div class="row justify-content-center mt-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Dashboard</div>

                    <div class="card-body">

                        <h1>{{ $chartDay->options['chart_title'] }}</h1>
                        {!! $chartDay->renderHtml() !!}
                        <hr />

                        <h1>{{ $chartMonth->options['chart_title'] }}</h1>
                        {!! $chartMonth->renderHtml() !!}
                        <hr />

                        <h1>{{ $chartYear->options['chart_title'] }}</h1>
                        {!! $chartYear->renderHtml() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {!! $chartDay->renderChartJsLibrary() !!}
    {!! $chartDay->renderJs() !!}
    {!! $chartMonth->renderJs() !!}
    {!! $chartYear->renderJs() !!}
@endsection
