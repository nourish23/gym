@extends('layouts/contentNavbarLayout')

@section('title', 'Create Review')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/review.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Review</span>
                    </div>
                    <div class="card-body">
                        <form id="review_form" method="POST" action="{{ route('reviews.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('review.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
