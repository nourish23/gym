@extends('layouts/contentNavbarLayout')

@section('title', {{ __('Create') }} Config)

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Config</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('configs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('config.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
