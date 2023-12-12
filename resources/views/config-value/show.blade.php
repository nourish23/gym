@extends('layouts/contentNavbarLayout')

@section('title', {{ __('Show') }} Config)

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Config Value</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('config_values.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Value:</strong>
                            {{ $configValue->value }}
                        </div>
                        <div class="form-group">
                            <strong>Icon:</strong>
                            {{ $configValue->icon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
