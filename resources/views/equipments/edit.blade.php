@extends('layouts/contentNavbarLayout')

@section('title', 'Update Equipment')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/equipment.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Equipment</span>
                    </div>
                    <div class="card-body">
                        <form id="equipment_form" method="POST" action="{{ route('equipments.update', $equipment->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('equipments.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
