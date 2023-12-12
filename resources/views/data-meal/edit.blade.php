@extends('layouts.contentNavbarLayout')

@section('template_title')
    {{ __('Update') }} Data Meal
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/meal-data.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Data Meal</span>
                    </div>
                    <div class="card-body">
                        <form id="meal_data_form" method="POST" action="{{ route('data-meals.update', $dataMeal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('data-meal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
