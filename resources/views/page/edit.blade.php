@extends('layouts/contentNavbarLayout')

@section('title',   {{ $page->name ?? "{{ __('Update') Page" )

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
                        <span class="card-title">{{ __('Update') }} Page</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('{pages}.update', $page->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('page.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
