@extends('layouts.master')

@section('header-title', @trans('auth.register'))

@section('main')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            {!! @trans('auth.cap-register') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--================login_part Area =================-->
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ @trans('auth.fullname') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ @trans('auth.email') }}</label>
                                    <input type="text" class="form-control" id="email" name="email" value="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ @trans('auth.password') }}</label>
                                    <input type="password" class="form-control" id="password" name="password" value="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ @trans('auth.phone') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ @trans('auth.birthdate') }}</label>
                                    <input type="date" name="birthdate" class="form-control" id="birthdate" value="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ @trans('auth.address') }}</label>
                                    <input type="text" name="address" class="form-control" id="address" value="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="male" class="text-capitalize mr-1">{{ @trans('auth.male') }}</label>
                                    <input type="radio" class="mr-1" id="male" name="gender" value="1">
                                    <label for="female" class="text-capitalize mr-1">{{ @trans('auth.female') }}</label>
                                    <input type="radio" class="mr-1" id="female" name="gender" value="2">
                                </div>
                                <div class="col-md-12 form-group ">
                                    <button type="submit" value="submit" class="btn_3">
                                        {{ @trans('auth.register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            {!! @trans('auth.login-iner') !!}
                            <a href="#" class="btn_3">{{ @trans('auth.login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
@endsection
