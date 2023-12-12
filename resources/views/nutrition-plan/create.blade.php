@extends('layouts.contentNavbarLayout')

@section('template_title')
   Create Nutrition Plan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Nutrition Plan</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('nutrition-plans.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('nutrition-plan.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
