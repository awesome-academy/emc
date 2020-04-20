@extends('layouts.master')

@section('header-title', 'Profile')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                                <h1 class="row justify-content-center">{{ @trans('auth.profile') }}</h1><hr />
                            <div class="ml-1">
                                <div class="fade show active">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <h5>{{ @trans('auth.fullname') }}</h5>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->full_name }}
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <h5">{{ @trans('auth.email') }}</h5>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <hr />

                                   <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <h5">{{ @trans('auth.birthdate') }}</h5>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->birthdate }}
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <h5">{{ @trans('auth.address') }}</h5>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->address }}
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <h5">{{ @trans('auth.phone') }}</h5>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->phone }}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row justify-content-center col-md-12">
                                        <a href="{{ route('user.edit') }}" class="btn_3">{{ @trans('auth.edit') }}</a>
                                        <a href="{{ route('user.passwordEdit') }}" class="btn_3">{{ @trans('auth.change-passowrd') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection