<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex mb-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('title') }}
                {{ Form::text('title', $plan->title, ['required' => 'required', 'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic title') }}
                {{ Form::text('title_ar', $plan->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
      
        <div class="d-flex my-4 ">
            <div class="form-group col-6 me-2">
                {{ Form::label('is_free') }}
                {{ Form::select('is_free', [1 => 'free', 0 => 'Paid'], $plan->is_free, ['required' => 'required', 'class' => 'form-control' . ($errors->has('is_free') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('is_free', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('price') }}
                {{ Form::number('price', $plan->price, ['required' => 'required', 'class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
                {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="d-flex my-4 ">
            <div class="form-group col-6">
                {{ Form::label('old_price') }}
                {{ Form::number('old_price', $plan->old_price, ['required' => 'required', 'class' => 'form-control' . ($errors->has('old_price') ? ' is-invalid' : ''), 'placeholder' => 'Old Price']) }}
                {!! $errors->first('old_price', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


        <div class="d-flex my-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('category_id') }}
                {{ Form::select('category_id', $categories, $plan->category_id, ['required' => 'required', 'class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('period') }}
                {{ Form::number('period', $plan->period, ['required' => 'required', 'class' => 'form-control' . ($errors->has('period') ? ' is-invalid' : ''), 'placeholder' => 'Period']) }}
                {!! $errors->first('period', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt-4 d-flex justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('plans.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
