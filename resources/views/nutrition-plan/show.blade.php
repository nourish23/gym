@extends('layouts.contentNavbarLayout')

@section('template_title')
    Show Nutrition Plan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Nutrition Plan</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.nutrition.plan', $nutritionPlan->user_id) }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group my-4">
                            <strong>User Id:</strong>
                            {{ $nutritionPlan->user->full_name }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Body Measurement Id:</strong>
                            {{ $nutritionPlan->bodymeasurement->weight }} kg
                        </div>
                        <div class="form-group my-4">
                            <strong>Plan Id:</strong>
                            {{ $nutritionPlan->plan->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Day Id:</strong>
                            {{ $nutritionPlan->day->name }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Meal:</strong>
                            {{ $nutritionPlan->meal->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Time Of Meal:</strong>
                            {{ date('h:i a', strtotime($nutritionPlan->time_of_meal)) }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>
                            @if ($nutritionPlan->status == 1)
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
