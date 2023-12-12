@extends('layouts/contentNavbarLayout')

@section('title', 'Show Country')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Country</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('countries.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $country->name }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $country->code }}
                        </div>
                        <div class="form-group">
                            <strong>Flag Url:</strong>
                            {{ $country->flag_url }}
                        </div>
                        <div class="form-group">
                            <strong>Phone Code:</strong>
                            {{ $country->phone_code }}
                        </div>
                        <div class="form-group">
                            <strong>Phone Length:</strong>
                            {{ $country->phone_length }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            @if ($country->status)
                                Enalble
                            @else
                                Disable
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
