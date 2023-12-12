@extends('layouts/contentNavbarLayout')

@section('title',   {{ __('Update') }} Newsletter)

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Newsletter</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('{newsletters}.update', $newsletter->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('newsletter.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
