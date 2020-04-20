@extends('layouts.master')

@section('header-title', 'Profile')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 order-lg-2">
            <div class="py-4">
            	<h1 class="row justify-content-center">{{ @trans('auth.edit-profile') }}</h1>
                <form method="POST" action="{{ route('user.update') }}" novalidate="novalidate">
                	@csrf
					
					@if(session('success'))
						<div class="alert alert-success" role="alert">
							{{session('success')}}
						</div>
					@endif

                    <div class="col-md-12 form-group p_star">
                        <label for="full_name" class="text-capitalize mr-1">{{ @trans('auth.fullname') }}</label>

                        <div>
                            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ $user->full_name }}" required autocomplete="full_name" autofocus>

                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-group p_star">
                        <label for="email" class="text-capitalize mr-1">{{ @trans('auth.email') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-group p_star">
                        <label for="birthdate" class="text-capitalize mr-1">{{ @trans('auth.birthdate') }}</label>

                        <div>
                            <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ $user->birthdate }}" required autocomplete="birthdate">

                            @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-group p_star">
                        <label for="address" class="text-capitalize mr-1">{{ @trans('auth.address') }}</label>

                        <div>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-group p_star">
                        <label for="phone" class="text-capitalize mr-1">{{ @trans('auth.phone') }}</label>

                        <div>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <label class="col-form-label form-control-label"></label>
                        <div>
                        	<button type="submit" class="btn btn-primary">
                                {{ @trans('auth.update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection