@extends('layouts/contentNavbarLayout')

@section('title', $class->name)

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
                            <h5 class="card-title">{{ __('Show') }} Class</h5>
                        </div>
                        <div class="float-right me-3">
                            <a class="btn btn-primary" href="{{ route('class.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-wrap">

                        <div class="form-group my-3 col-6">
                            <strong>Title:</strong>
                            {{ $class->title }}
                        </div>

                        <div class="form-group my-3 col-6">
                            <strong>Description:</strong>
                            {{ $class->description }}
                        </div>
                        <div class="form-group my-3 col-12 d-flex flex-column ">
                            <strong>Thumbnail Url:</strong>

                            <img src="{{ $class->thumbnail_url }}" width="150px" alt=" ">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
