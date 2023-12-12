@extends('layouts/contentNavbarLayout')

@section('title', 'Show Scheduled Class')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Scheduled Class</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('scheduled-classes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group mb-3">
                            <strong>Plan Class Id:</strong>
                            {{ $scheduledClass->planClass->title }}
                        </div>
                        <div class="form-group my-3">
                            <strong>Day Id:</strong>
                            {{ $scheduledClass->day->name }}
                        </div>
                        <div class="form-group my-3">
                            <strong>Start Time:</strong>
                            {{ \Carbon\Carbon::parse($scheduledClass->start_time)->setTimezone($timezone)->format('Y-m-d H:i:s') }}
                        </div>
                        <div class="form-group my-3">
                            <strong>End Time:</strong>
                            {{ \Carbon\Carbon::parse($scheduledClass->end_time)->setTimezone($timezone)->format('Y-m-d H:i:s') }}

                        </div>
                        <div class="form-group my-3">
                            <strong>Status:</strong>
                            @if ($scheduledClass->status == 1)
                                <span class="text-success p-1 rounded-1">Enabled</span>
                            @else
                                <span class="text-danger p-1 rounded-1">Disenabled</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
