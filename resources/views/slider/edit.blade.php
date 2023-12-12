@extends('layouts/contentNavbarLayout')

@section('title', 'Update Slider')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/slider.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Slider</span>
                    </div>
                    <div class="card-body">
                        <form  id="slider_form" method="POST" action="{{ route('sliders.update', $slider->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('slider.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
