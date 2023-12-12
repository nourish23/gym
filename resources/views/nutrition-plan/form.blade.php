<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex my-4">
   
            <div class="form-group col-6 me-1">
                {{ Form::label('body_measurement ') }}
                {{ Form::select('body_measurement_id', $data['bodyMeasurement'], $nutritionPlan->body_measurement_id, ['class' => 'form-control' . ($errors->has('body_measurement_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('body_measurement_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
     
            <div class="form-group col-6 me-1">
                {{ Form::label('day ') }}
                {{ Form::select('day_id', $data['days'], $nutritionPlan->day_id, ['class' => 'form-control' . ($errors->has('day_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('day_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-1">
                {{ Form::label('meal') }}
                {{ Form::select('meal_id', $data['meals'], $nutritionPlan->meal_id, ['class' => 'form-control' . ($errors->has('meal') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('meal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 me-1">
                {{ Form::label('status') }}
                {{ Form::select('status', [1 => 'Enable', 0 => 'DisEnable'], $nutritionPlan->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group col-6 me-1">
            {{ Form::label('time_of_meal') }}
            {{ Form::time('time_of_meal', $nutritionPlan->time_of_meal, ['format' => 'h:i A', 'class' => 'form-control' . ($errors->has('time_of_meal') ? ' is-invalid' : ''), 'placeholder' => 'Time Of Meal']) }}
            {!! $errors->first('time_of_meal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{ Form::hidden('user_id', $data['user']->id) }}
        {{ Form::hidden('plan_id',$data['user']->plan_id ?? 1) }}

    </div>
    <div class="box-footer mt-4 d-flex">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>
</div>
