@extends('layouts/contentNavbarLayout')

@section('title', 'Update Review')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/review.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Review</span>
                    </div>
                    <div class="card-body">
                        <form id="review_form" method="POST" action="{{ route('reviews.update', $review->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('review.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
