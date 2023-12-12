@extends('layouts/contentNavbarLayout')

@section('title', 'Create Scheduled Class')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/schedule-class.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Scheduled Class</span>
                    </div>
                    <div class="card-body">
                        <form  id="scheduled_class_form" method="POST" action="{{ route('scheduled-classes.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('scheduled-class.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
