@extends('layouts/contentNavbarLayout')

@section('title', 'Update Scheduled Class')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/schedule-class.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Scheduled Class</span>
                    </div>
                    <div class="card-body">
                        <form id="scheduled_class_form" method="POST" action="{{ route('scheduled-classes.update', $scheduledClass->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('scheduled-class.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
