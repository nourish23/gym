@extends('layouts/contentNavbarLayout')

@section('title', 'Show Coach')

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
                            <h5 class="card-title">{{ __('Show') }} Coach</h5>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('coachs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group mb-4 text-center w-100">
                            <img src="{{ $coach->image_url }}" width="75" alt=" ">
                        </div>
                        <div class="form-group mb-4">
                            <strong>Name:</strong>
                            {{ $coach->name }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Brief:</strong>
                            {{ $coach->brief }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Description:</strong>
                            {{ $coach->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
