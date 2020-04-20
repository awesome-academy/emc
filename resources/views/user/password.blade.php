@extends('layouts.master')

@section('header-title', 'Password')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 order-lg-2">
			<h1 class="row justify-content-center">{{ @trans('auth.change-passowrd') }}</h1>
	        <form role="form" method="POST" action="{{ route('user.passwordUpdate') }}">
				@csrf	
				
				@if(session('success'))
					<div class="alert alert-success" role="alert">
						{{session('success')}}
					</div>
				@endif

				@if(session('error'))
					<div class="alert alert-danger" role="alert">
						{{session('error')}}
					</div>
				@endif

				<div class="col-md-12 form-group p_star">
                    <label for="currentPassword" class="text-capitalize mr-1">{{ @trans('auth.current-password') }}</label>

                    <div>
                        <input id="currentPassword" type="password" class="form-control @error('currentPassword') is-invalid @enderror" name="currentPassword" required autocomplete="new-password">

                        @error('currentPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

	            <div class="col-md-12 form-group p_star">
                    <label for="password" class="text-capitalize mr-1">{{ @trans('auth.password') }}</label>

                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

	            <div class="col-md-12 form-group p_star">
                    <label for="password-confirm" class="text-capitalize mr-1">{{ @trans('auth.password-confirm') }}</label>

                    <div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
@endsection