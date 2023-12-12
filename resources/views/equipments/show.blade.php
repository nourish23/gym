@extends('layouts/contentNavbarLayout')

{{-- @section('title', {{ $equipment->name ?? "{{ __('Show') Equipment" }}) --}}
@section('title',"Show Equipment" )

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left ">
                            <h5 class="card-title">{{ __('Show') }} Equipment</h5>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group mb-4">
                            <strong>Name:</strong>
                            {{ $equipment->name }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Additional Info:</strong>
                            {{ $equipment->additional_info }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>
                             @if ($equipment->status)
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
