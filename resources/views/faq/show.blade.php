@extends('layouts/contentNavbarLayout')

@section('title', 'Show Faq')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Faq</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('faqs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group mb-4">
                            <strong>Question:</strong>
                            {{ $faq->question }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Answer:</strong>
                            {{ $faq->answer }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>
                            @if ($faq->status == 1)
                                <span class="text-success p-1 rounded-1">Enabled</span>
                            @else
                                <span class="text-danger p-1 rounded-1">Disenabled</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
