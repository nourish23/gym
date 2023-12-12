@extends('layouts/contentNavbarLayout')

@section('title', 'Update Coach')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/coach.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Coach</span>
                    </div>
                    <div class="card-body">
                        <form id="coach_form" method="POST" action="{{ route('coachs.update', $coach->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('coach.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
