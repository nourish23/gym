@extends('layouts/contentNavbarLayout')

@section('title',  'Add Body Measurement' )

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/body-measurement.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Body Measurement</span>
                    </div>
                    <div class="card-body">
                        <form id="body_measurement_form" method="POST" action="{{ route('body-measurements.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('body-measurement.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
