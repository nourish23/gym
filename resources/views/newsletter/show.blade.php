@extends('layouts/contentNavbarLayout')

@section('title',   {{ $newsletter->name ?? "{{ __('Show') Newsletter" }})

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
                            <span class="card-title">{{ __('Show') }} Newsletter</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('{newsletters}.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $newsletter->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
