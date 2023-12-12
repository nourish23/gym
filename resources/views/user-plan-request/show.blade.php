@extends('layouts.app')

@section('template_title')
    {{ $userPlanRequest->name ?? "{{ __('Show') User Plan Request" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User Plan Request</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('{userplanrequests}.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $userPlanRequest->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Plan Id:</strong>
                            {{ $userPlanRequest->plan_id }}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {{ $userPlanRequest->notes }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
