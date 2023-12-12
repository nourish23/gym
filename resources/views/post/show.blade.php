@extends('layouts.contentNavbarLayout')

@section('template_title')
    "Show Post"
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Post</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('posts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group text-center my-4">
                            <img src="{{ $post->image }}" width="150px" 
                            alt=" ">
                        </div>
                        <div class="form-group mb-4">
                            <strong>Title:</strong>
                            {{ $post->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Seo Meta Title:</strong>
                            {{ $post->seo_meta_title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Seo Meta Text:</strong>
                            {{ $post->seo_meta_text }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Seo Meta Keywords:</strong>
                            {{ $post->seo_meta_keywords }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Description:</strong>
                            {{ $post->description }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>
                            @if ($post->status)
                                Enalble
                            @else
                                Disable
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
