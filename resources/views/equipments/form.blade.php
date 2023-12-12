<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex mb-4">
            <div class="form-group col-6  me-2">
                {{ Form::label('name') }}
                {{ Form::text('name', $equipment->name, ['required' => 'required', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic name') }}
                {{ Form::text('name_ar', $equipment->getTranslation('name', 'ar', false), ['class' => 'form-control' . ($errors->has('name_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Name']) }}
                {!! $errors->first('name_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('additional_info') }}
                {{ Form::textarea('additional_info', $equipment->additional_info, ['required' => 'required', 'rows' => 5, 'class' => 'form-control' . ($errors->has('additional_info') ? ' is-invalid' : ''), 'placeholder' => ' Additional Info']) }}
                {!! $errors->first('additional_info', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic additional_info') }}
                {{ Form::textarea('additional_info_ar', $equipment->getTranslation('additional_info', 'ar', false), ['rows' => 5, 'class' => 'form-control' . ($errors->has('additional_info_ar') ? ' is-invalid' : ''), 'placeholder' => 'Additional Arabic  Info']) }}
                {!! $errors->first('additional_info_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group my-4">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enable', 0 => 'Disable'], $equipment->status, ['required' => 'required', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-4 d-flex  justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('equipments.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary ">{{ __('Submit') }}</button>
    </div>
</div>
