<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('equipment_id') }}
            {{ Form::text('equipment_id', $planClassesEquipment->equipment_id, ['class' => 'form-control' . ($errors->has('equipment_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipment Id']) }}
            {!! $errors->first('equipment_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('plan_class_id') }}
            {{ Form::text('plan_class_id', $planClassesEquipment->plan_class_id, ['class' => 'form-control' . ($errors->has('plan_class_id') ? ' is-invalid' : ''), 'placeholder' => 'Plan Class Id']) }}
            {!! $errors->first('plan_class_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>