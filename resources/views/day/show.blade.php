@extends('layouts/contentNavbarLayout')

@section('title',   {{ $day->name ?? "{{ __('Show') Day" }})

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Day</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('days.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $day->name }}
                        </div>
                        <div class="form-group">
                            <strong>Day:</strong>
                            {{ $day->day }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $day->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
