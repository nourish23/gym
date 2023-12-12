@extends('layouts/contentNavbarLayout')

@section('title', 'Create Plan Class')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/plan-class.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
  
   
  
  <script>
        $(document).ready(function() {
            $('#equipment_id').select2();
        });
    </script>




@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
{{-- @php
    dd(route('planclasses.store'))
@endphp --}}
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Plan Class</span>
                    </div>
                    <div class="card-body">
                        <form id="plan_class_form"  role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('plan-class.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
