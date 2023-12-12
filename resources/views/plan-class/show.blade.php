@extends('layouts/contentNavbarLayout')

@section('title', $planClass->name)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <h5 class="card-title">{{ __('Show') }} Plan Class</h5>
                        </div>
                        <div class="float-right me-3">
                            <a class="btn btn-primary" href="{{ route('planclasses.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-wrap">

                        <div class="form-group my-3 col-6">
                            <strong>Title:</strong>
                            {{ $planClass->title }}
                        </div>

                        <div class="form-group my-3 col-6">
                            <strong>Description:</strong>
                            {{ $planClass->description }}
                        </div>
                        <div class="form-group my-3 col-6">
                            <strong>Status:</strong>
                            {{ $planClass->status }}
                        </div>
                        <div class="form-group my-3 col-6">
                            <strong>Class Type:</strong>
                            {{ $planClass->class_type }}
                        </div>
                        <div class="form-group my-3 col-6">
                            <strong>Duration:</strong>
                            {{ $planClass->duration }}
                        </div>
                        <div class="form-group my-3 col-6">
                            <strong>Color:</strong>
                            {{ $planClass->color }}
                        </div>
                        <div class="form-group my-3 col-6">
                            <strong>Burn Rate:</strong>
                            {{ $planClass->burn_rate }}
                        </div>
                        <div class="form-group my-3 col-6">
                            <strong>Coache Id:</strong>
                            {{ $planClass->coach->name }}
                        </div>
                        <div class="form-group my-3 col-12 d-flex flex-column ">
                            <strong>Thumbnail Url:</strong>

                            <img src="{{ $planClass->thumbnail_url }}" width="150px" alt=" ">
                        </div>
                        <div class="form-group my-3 d-flex flex-column ">
                            <strong>Video Url:</strong>
                            <video class="w-100" controls>
                                <source src="{{ $planClass->video_url }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
