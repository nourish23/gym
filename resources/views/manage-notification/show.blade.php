@extends('layouts/contentNavbarLayout')

@section('title', 'Show Manage Notification')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left ">
                            <span class="card-title">{{ __('Show') }} Manage Notification</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('manage-notifications.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group mt-4">
                            <strong>Title:</strong>
                            {{ $manageNotification->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Text:</strong>
                            {{ $manageNotification->text }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Before Days Num:</strong>
                            {{ $manageNotification->before_days_num }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Type:</strong>
                            {{ $manageNotification->type }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Day :</strong>
                            {{ $manageNotification->day->name }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Email Template Title:</strong>
                            {{ $manageNotification->emailTemplate->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>
                            @if ($manageNotification->status)
                                <span class=" text-success">Enabled</span>
                            @else
                                <span class=" text-danger">Disenabled</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
