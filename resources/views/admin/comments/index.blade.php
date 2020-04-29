@extends('layouts.master')
@section('header-title', trans('admin.manage-comment'))

@section('main')
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('images/contact-hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ trans('admin.manage-comment') }}</h2>
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
                        @if(session('activeCommentSuccess'))
                            <div class="alert alert-success" role="alert">
                                {{session('activeCommentSuccess')}}
                            </div>
                        @elseif(session('lockCommentSuccess'))
                            <div class="alert alert-warning" role="alert">
                                {{session('lockCommentSuccess')}}
                            </div>
                        @elseif(session('deleteCommentSuccess'))
                            <div class="alert alert-danger" role="alert">
                                {{session('deleteCommentSuccess')}}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border">{{ trans('admin.user') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.product') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.status') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.created_at') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.content') }}</th>
                                    <th scope="col" class="border">{{ trans('admin.option') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td class="border">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/2.png') }}" alt="Image user" class="image-user"/>
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $comment->user->full_name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-right text-center">
                                            <h5>{{ $comment->product->name }} </h5>
                                        </td>
                                        <td class="border-right text-center">
                                            @if($comment->status == \App\Models\Comment::ACTIVE)
                                                <h5>{{ trans('admin.attribute-comment.active') }}</h5>
                                            @else
                                                <h5>{{ trans('admin.attribute-comment.lock') }}</h5>
                                            @endif
                                        </td>
                                        <td  class="border-right text-center">
                                            <h5>{{ $comment->created_at }} </h5>
                                        </td>
                                        <td class="border-right">
                                            <h5>{{ $comment->content }} </h5>
                                        </td>
                                        <td class="text-center border text-center">
                                            @if ($comment->status == \App\Models\Comment::ACTIVE)
                                                <a class="pl-1" title="Lock"
                                                    href="{{ route('admin.comment.lock', ['id' => $comment->id]) }}">
                                                    <i class="fas fa-lock text-dark"></i>
                                                </a>
                                            @else
                                                <a class="pl-1" title="Active"
                                                    href="{{ route('admin.comment.active', ['id' => $comment->id]) }}">
                                                    <i class="fas fa-unlock text-dark"></i>
                                                </a>
                                            @endif
                                            <a class="pl-1 border-left" title="Remove"
                                                href="{{ route('admin.comment.delete', ['id' => $comment->id]) }}" >
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
        {!! $comments->links() !!}
    </div>
@endsection
