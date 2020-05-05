@extends('layouts.master')
@section('header-title', trans('admin.manage-user'))

@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ trans('admin.manage-user') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="row">
                    <div class="col-md-3 float-left">
                        <form action="{{ route('admin.user.index') }}" method="GET" class="d-flex mb-3">
                            <input type="text" name="key" id="input" class="form-control" value="" placeholder="Search Name User ...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                        @if(session('lock-success'))
                            <div class="alert alert-success" role="alert">
                                {{session('lock-success')}}
                            </div>
                        @elseif(session('active-success'))
                            <div class="alert alert-success" role="alert">
                                {{session('active-success')}}
                            </div>
                        @elseif(session('destroy-success'))
                            <div class="alert alert-danger" role="alert">
                                {{session('destroy-success')}}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border">{{ trans('admin.user') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.gender') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.email') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.phone') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.address') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.status') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.option') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/2.png') }}" alt="Image user" class="image-user"/>
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $user->full_name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-right">
                                            @if ($user->gender == \App\Models\User::MALE)
                                                <h5>{{ trans('admin.attribute-user.male') }} </h5>
                                            @else
                                                <h5>{{ trans('admin.attribute-user.female') }} </h5>
                                            @endif
                                        </td>
                                        <td class="border-right">
                                            <h5>{{ $user->email }} </h5>
                                        </td>
                                        <td class="border-right">
                                            <h5>{{ $user->phone }} </h5>
                                        </td>
                                        <td  class="border-right">
                                            <h5>{{ $user->address }} </h5>
                                        </td>
                                        <td class="border-right">
                                            @if ($user->status == \App\Models\User::ACTIVE)
                                                <h5>{{ trans('admin.attribute-user.active') }} </h5>
                                            @else
                                                <h5>{{ trans('admin.attribute-user.lock') }} </h5>
                                            @endif
                                        </td>
                                        <td class="text-center border">
                                            @if ($user->status == \App\Models\User::ACTIVE)
                                                <a class="pl-1" title="Lock"
                                                    href="{{ route('admin.user.lock', ['id' => $user->id]) }}">
                                                    <i class="fas fa-lock text-dark"></i>
                                                </a>
                                            @else
                                                <a class="pl-1" title="Active"
                                                    href="{{ route('admin.user.active', ['id' => $user->id]) }}">
                                                    <i class="fas fa-unlock text-dark"></i>
                                                </a>
                                            @endif
                                            <a class="pl-1 border-left" title="Remove"
                                                href="{{ route('admin.user.destroy', ['id' => $user->id]) }}" >
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
        {!! $users->links() !!}
    </div>
@endsection
