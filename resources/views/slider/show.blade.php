@extends('layouts/contentNavbarLayout')

@section('title', 'Show Slider ')

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
                            <span class="card-title">{{ __('Show') }} Slider</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sliders.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group my-4 text-center">
                            <img src="{{ $slider->image_url }}" width="150px" alt=" ">
                        </div>
                        <div class="form-group mb-4">
                            <strong>Title:</strong>
                            {{ $slider->title }}
                        </div>

                        <div class="form-group my-4">
                            <strong>Text:</strong>
                            {{ $slider->text }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Url:</strong>
                            {{ $slider->url }}
                        </div>
                        <div class="form-group my-4">
                            <strong>Is Clickable:</strong>
                            @if ($slider->is_clickable == 1)
                                <span class="text-success p-1 rounded-1">Yes</span>
                            @else
                                <span class="text-danger p-1 rounded-1">No</span>
                            @endif
                        </div>
                        <div class="form-group my-4">
                            <strong>Target Blank:</strong>
                            @if ($slider->target_blank == 1)
                                <span class="text-success p-1 rounded-1">Yes</span>
                            @else
                                <span class="text-danger p-1 rounded-1">No</span>
                            @endif
                        </div>

                        <div class="form-group my-4">
                            <strong>Status:</strong>
                            @if ($slider->status == 1)
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
