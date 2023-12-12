<div class="box box-info padding-1">
    <div class="box-body">
        {{-- <div class="d-flex my-4"> --}}
            <div class="form-group  ">
                {{ Form::label('meal ') }}
                {{ Form::textarea('body', $dataMeal->body, ['rows' => 5, 'class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Meal']) }}
                {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            {{-- <div class="form-group col-6 ">
                {{ Form::label('Arabic meal') }}
                {{ Form::textarea('body_ar', $dataMeal->getTranslation('body', 'ar', false), ['rows' => 5, 'class' => 'form-control' . ($errors->has('body_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Meal']) }}
                {!! $errors->first('body_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
        {{-- </div> --}}

        <div class="form-group my-4">
            {{ Form::label('day ') }}
            {{ Form::select('day_id', $days, $dataMeal->day_id, ['class' => 'form-control' . ($errors->has('day_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
            {!! $errors->first('day_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group my-4">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enabled', 0 => 'Disenabled'], $dataMeal->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{ Form::hidden('meal_id', $mealID) }}

    </div>
 
    <div class="box-footer mt-5 d-flex justify-content-end">
         <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
