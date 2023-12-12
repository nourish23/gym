@extends('layouts/contentNavbarLayout')

@section('title', 'Show Review')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <h5 class="card-title">{{ __('Show') }} Review</h5>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reviews.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        {{-- <div class="form-group text-center w-100 my-4">
                            <img src="{{ asset($review->image) }}" width="75" alt="User Image">
                        </div> --}}
                        <div class="form-group mb-4">
                            <strong>Name:</strong>
                            {{ $review->name }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Text:</strong>
                            {{ $review->text }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>
                            {{ $review->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
