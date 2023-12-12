@extends('layouts.contentNavbarLayout')

@section('template_title')
    Show Week
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Week</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('weeks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group my-4">
                            <strong>Title:</strong>
                            {{ $week->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>

                            @if ($week->status)
                                <span class=" text-success">Enabled</span>
                            @else
                                <span class=" text-danger">Disenabled</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
