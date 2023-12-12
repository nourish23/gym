<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group mb-4">
            {{ Form::label('title') }}
            {{ Form::text('title', $week->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my4">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enabled', 0 => 'Disenabled'], $week->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-4 d-flex">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>
</div>