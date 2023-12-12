@extends('layouts.contentNavbarLayout')

@section('template_title')
    'Show Category'
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categories.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group mb-4">
                            <strong>Title:</strong>
                            {{ $category->title }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Description:</strong>
                            {{ $category->description }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Status:</strong>
                            @if ($category->status == 1)
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
