@extends('layouts.contentNavbarLayout')

@section('template_title')
    Update Nutrition Plan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Nutrition Plan</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('nutrition-plans.update', $nutritionPlan->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('nutrition-plan.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
