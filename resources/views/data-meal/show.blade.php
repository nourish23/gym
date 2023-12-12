@extends('layouts.contentNavbarLayout')

@section('template_title')
    {{ __('Show') }} Data Meal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Data Meal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('data-meals.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $dataMeal->body }}
                        </div>
                        <div class="form-group">
                            <strong>Day Id:</strong>
                            {{ $dataMeal->day_id }}
                        </div>
                        <div class="form-group">
                            <strong>Meal Id:</strong>
                            {{ $dataMeal->meal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $dataMeal->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
