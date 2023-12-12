@extends('layouts/contentNavbarLayout')

@section('title', {{ $userService->name ?? "{{ __('Show') User Service" }})

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
                            <span class="card-title">{{ __('Show') }} User Service</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('{userservices}.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $userService->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Service Id:</strong>
                            {{ $userService->service_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
