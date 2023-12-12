@extends('layouts/contentNavbarLayout')

@section('title', 'Show User')

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
                            <h5 class="card-title">{{ __('Show') }} User</h5>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group  mb-4">
                            <strong>First Name:</strong>
                            {{ $user->first_name }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Last Name:</strong>
                            {{ $user->last_name }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Phone Number:</strong>
                            {{ $user->phone_number }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Age:</strong>
                            {{ $user->age }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Do You Have Anything Else To Tell Us About:</strong>
                            {{ $user->do_you_have_anything_else_to_tell_us_about }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>How Did You Hear About Us:</strong>
                            {{ $user->how_did_you_hear_about_us }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Subscription Status:</strong>
                            {{ $user->subscription_status == 1 ? 'Enable' : 'Disable' }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Subscription start Date:</strong>
                            {{ Carbon\Carbon::parse($user->subscription_start_date)->format('Y-m-d') }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Subscription End Date:</strong>
                            @if (is_null($user->subscription_end_date))
                                --
                            @else
                                {{ Carbon\Carbon::parse($user->subscription_end_date)->format('Y-m-d') }}
                            @endif
                        </div>
                        <div class="form-group  my-4">
                            <strong>Terms And Conditions Acceptance:</strong>
                            {{ $user->terms_and_conditions_acceptance == 1 ? 'Accepted' : 'Rejected' }}
                        </div>

                        <div class="form-group  my-4">
                            <strong>Diseases Symptoms:</strong>
                            {{ $user->diseases_symptoms }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Health Problems:</strong>
                            {{ $user->health_problems }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Food Disliked:</strong>
                            {{ $user->food_disliked }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Food Allergies:</strong>
                            {{ $user->food_allergies }}
                        </div>
                        <div class="form-group  my-4">
                            <strong>Supplements Taken:</strong>
                            {{ $user->supplements_taken }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
