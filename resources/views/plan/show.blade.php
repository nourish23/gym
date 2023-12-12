@extends('layouts.contentNavbarLayout')

@section('template_title')
    Show Plan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Plan</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('plans.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group my-4">
                            <strong>Title:</strong>
                            {{ $plan->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Is Free:</strong>
                            @if ($plan->is_free == 1)
                                <span class="text-success p-1 rounded-1">Free</span>
                            @else
                                <span class="text-primary p-1 rounded-1">Paid</span>
                            @endif
                        </div>
                        <div class="form-group my-4">
                            <strong>Price:</strong>
                            {{ $plan->price }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Period:</strong>
                            {{ $plan->period }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Category Id:</strong>
                            {{ $plan->category->title }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
