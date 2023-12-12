@extends('layouts.contentNavbarLayout')

@section('template_title')
Show Meal
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Meal</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body my-3 ">
                    <div class="d-flex">
                        <div class="form-group col-3">
                            <strong>Title:</strong>
                            {{ $meal->title }}
                        </div>
                        <div class="form-group col-3">
                            <strong>Time:</strong>
                            {{ date('h:i a', strtotime($meal->time)) }}
                        </div>

                        <div class="form-group col-3">
                            <strong>Week Id:</strong>
                            {{ $meal->week->title }}
                        </div>
                        <div class="form-group col-3">
                            <strong>Status:</strong>
                            @if ($meal->status == 1)
                            <span class="text-success p-1 rounded-1">Enabled</span>
                            @else
                            <span class="text-danger p-1 rounded-1">Disenabled</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('meal.dataMeal')
    </div>
</section>
@endsection
