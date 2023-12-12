<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group my-4">
            {{ Form::label('name') }}
            {{ Form::text('name', $country->name, ['required' => 'required', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('code') }}
            {{ Form::text('code', $country->code, ['required' => 'required', 'class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('flag_url') }}
            {{ Form::text('flag_url', $country->flag_url, ['required' => 'required', 'class' => 'form-control' . ($errors->has('flag_url') ? ' is-invalid' : ''), 'placeholder' => 'Flag Url']) }}
            {!! $errors->first('flag_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('phone_code') }}
            {{ Form::text('phone_code', $country->phone_code, ['required' => 'required', 'class' => 'form-control' . ($errors->has('phone_code') ? ' is-invalid' : ''), 'placeholder' => 'Phone Code']) }}
            {!! $errors->first('phone_code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('phone_length') }}
            {{ Form::number('phone_length', $country->phone_length, ['min' => 0, 'step' => 1, 'required' => 'required', 'class' => 'form-control' . ($errors->has('phone_length') ? ' is-invalid' : ''), 'placeholder' => 'Phone Length']) }}
            {!! $errors->first('phone_length', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('Currency') }}
            {{ Form::text('currency', $country->currency, ['required' => 'required', 'class' => 'form-control' . ($errors->has('currency') ? ' is-invalid' : ''), 'placeholder' => 'Currency']) }}
            {!! $errors->first('currency', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enable', 0 => 'Disable'],  $country->status, ['required' => 'required', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

    <div class="box-footer d-flex">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>
</div>
