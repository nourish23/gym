@extends('layouts/contentNavbarLayout')

@section('title', 'Update Class')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/class.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Class</span>
                    </div>
                    <div class="card-body">
                        <form id="class_form" method="POST" action="{{ route('class.update', $class->id) }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('class.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
