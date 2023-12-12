@extends('layouts/contentNavbarLayout')

@section('title', 'Update Body Measurement')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/body-measurement.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Body Measurement</span>
                    </div>
                    <div class="card-body">
                        <form id="body_measurement_form" method="POST" action="{{ route('body-measurements.update', $bodyMeasurement->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('body-measurement.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
