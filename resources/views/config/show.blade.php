@extends('layouts/contentNavbarLayout')

@section('title', {{ $config->name ?? "{{ __('Show') Config" }})

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
                            <span class="card-title">{{ __('Show') }} Config</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('configs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $config->title }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $config->type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
