@extends('layouts/contentNavbarLayout')

@section('title',   {{ $page->name ?? "{{ __('Show') Page" )

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
                            <span class="card-title">{{ __('Show') }} Page</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('{pages}.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $page->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $page->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $page->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
