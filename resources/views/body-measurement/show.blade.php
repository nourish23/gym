@extends('layouts/contentNavbarLayout')

@section('title', 'Show Body Measurement')

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
                            <span class="card-title">{{ __('Show') }} Body Measurement</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.body.measurements', $bodyMeasurement->user_id) }}"> {{ __('Back') }}</a>
                         </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex mb-4">
                            <div class="form-group col-6">
                                <strong>Weight:</strong>
                                {{ $bodyMeasurement->weight }} kg
                            </div>
                            <div class="form-group col-6">
                                <strong>Height:</strong>
                                {{ $bodyMeasurement->height }} cm
                            </div>
                        </div>
                        <div class="d-flex my-4">
                            <div class="form-group col-6">
                                <strong>Chest:</strong>
                                {{ $bodyMeasurement->chest }} cm
                            </div>
                            <div class="form-group col-6">
                                <strong>Waist:</strong>
                                {{ $bodyMeasurement->waist }} cm
                            </div>
                        </div>
                        <div class="d-flex my-4">
                            <div class="form-group col-6">
                                <strong>Abs:</strong>
                                {{ $bodyMeasurement->abs }}  
                            </div>
                            <div class="form-group col-6">
                                <strong>Hips:</strong>
                                {{ $bodyMeasurement->hips }} cm 
                            </div>
                        </div>
                        <div class="d-flex my-4">
                            <div class="form-group col-6">
                                <strong>Left Thigh:</strong>
                                {{ $bodyMeasurement->left_thigh }} cm
                            </div>
                            <div class="form-group col-6">
                                <strong>Right Thigh:</strong>
                                {{ $bodyMeasurement->right_thigh }} cm
                            </div>
                        </div>
                        <div class="d-flex my-4">
                            <div class="form-group col-6">
                                <strong>Left Arm:</strong>
                                {{ $bodyMeasurement->left_arm }} cm
                            </div>
                            <div class="form-group col-6">
                                <strong>Right Arm:</strong>
                                {{ $bodyMeasurement->right_arm }} cm
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <strong>User</strong>
                            {{ $bodyMeasurement->user->first_name . ' ' . $bodyMeasurement->user->last_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
