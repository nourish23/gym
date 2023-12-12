<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('value') }}
            {{ Form::text('value', $configValue->value, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => 'Value']) }}
            {!! $errors->first('value', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('icon') }}
            {{ Form::text('icon', $configValue->icon, ['class' => 'form-control' . ($errors->has('icon') ? ' is-invalid' : ''), 'placeholder' => 'Icon']) }}
            {!! $errors->first('icon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>