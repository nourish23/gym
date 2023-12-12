@extends('layouts.contentNavbarLayout')

@section('template_title')
    {{ __('Update') }} Meal
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/meal.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')
           

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Meal</span>
                    </div>
                    <div class="card-body">
                        <form id="meal_form" method="POST" action="{{ route('meals.update', $meal->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('meal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
