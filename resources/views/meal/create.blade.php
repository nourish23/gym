@extends('layouts.contentNavbarLayout')

@section('template_title')
    {{ __('Create') }} Meal
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/meal.js') }}"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                <div class="card card-default mb-3">
                    <div class="card-header">
                        <span class="card-title">{{ __('Import') }} Meals</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('meal.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex my-4">
                                <div class="form-group col-6 me-2">
                                    {{ Form::label('week ') }}
                                    {{ Form::select('week_id', $data['weeks'], $meal->week_id, ['class' => 'form-control' . ($errors->has('week_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                                    {!! $errors->first('week_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group col-6 d-flex flex-column">
                                    {{ Form::label('File ') }}
                                    <input type="file" name="excel_file" class="mt-1" accept=".xlsx, .xls">
                                </div>
                            </div>
                            @isset($user)
                                <input type="hidden" name="user_id" value={{ $user->id }}>
                            @else
                                @if ($meal->user_id)
                                    <input type="hidden" name="user_id" value={{ $meal->user_id }}>

                                    {{ Form::hidden('user_id', $meal->user_id) }}
                                @else
                                    <div class="form-group  my-4">
                                        {{ Form::label('user') }}
                                        {{ Form::select('user_id', $data['userOptions'], $meal->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                @endif
                            @endisset
                            <div class="box-footer mt-4 d-flex justify-content-end">
                                <a class="btn btn-secondary me-1" href="{{ route('users.index') }}">
                                    {{ __('Back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- 
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Meal</span>
                    </div>
                    <div class="card-body">
                        <form id="meal_form" method="POST" action="{{ route('meals.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('meal.form')

                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
