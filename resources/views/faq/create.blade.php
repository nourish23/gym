@extends('layouts/contentNavbarLayout')

@section('title', 'Create Faq')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/fqa.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Faq</span>
                    </div>
                    <div class="card-body">
                        <form id="fqa_form" method="POST" action="{{ route('faqs.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('faq.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
