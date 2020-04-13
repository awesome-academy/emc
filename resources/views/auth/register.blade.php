@extends('layouts.master')

@section('header-title', 'Register')

@section('main')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background= {{ asset("/img/hero/category.jpg") }} >
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Register</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <section class="login_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <form method="POST" action="{{ route('register') }}" class="row contact_form" novalidate="novalidate">
                            @csrf


                            <div class="col-md-12 form-group p_star">
                                <label for="full_name" class="text-capitalize mr-1">{{ __('Full Name') }}</label>

                                <div>
                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus placeholder="Full Name">

                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="email" class="text-capitalize mr-1">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="password" class="text-capitalize mr-1">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="password-confirm" class="text-capitalize mr-1">{{ __('Confirm Password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Comfirm Password">
                                </div>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="birthdate" class="text-capitalize mr-1">{{ __('Day of Birthday') }}</label>

                                <div>
                                    <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" placeholder="Day of Birth">

                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="address" class="text-capitalize mr-1">{{ __('Address') }}</label>

                                <div>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('birthdate') }}" required autocomplete="address" placeholder="Address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="phone" class="text-capitalize mr-1">{{ __('Phone') }}</label>

                                <div>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('birthdate') }}" required autocomplete="phone" placeholder="Phone Number">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ __('Male') }}</label>
                                    <input id="male" type="radio" name="gender" value="1" required autocomplete="gender">
                                    
                                    <label for="female" class="text-capitalize mr-1">{{ __('Female') }}</label>
                                    <input id="female" type="radio" name="gender" value="2" required autocomplete="gender">
                            </div>

                            <!-- <div class="col-md-12 form-group p_star">
                                <label for="role" class="text-capitalize mr-1">{{-- {{ __('Role') }} --}}</label>
                            
                                    <input id="role" type="radio" name="role" value="1" required autocomplete="gender">
                            </div> -->

                            <div class="col-md-12 form-group ">
                                <div>
                                    <button type="submit" value="submit" class="btn_3">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Already have an account?</h2>
                        <p>>What are you waiting for without buying the best products on our website yet?</p>
                        <a href="{{ route('login') }}" class="btn_3">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
