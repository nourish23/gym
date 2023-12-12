@extends('layouts.contentNavbarLayout')

@section('template_title')
    {{ __('Update') }} Plan
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/validation/plan.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Plan</span>
                    </div>
                    <div class="card-body">
                        <form id="plan_form" method="POST" action="{{ route('plans.update', $plan->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('plan.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
