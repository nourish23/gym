<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex mb-4">
            <div class="form-group col-6  me-2">
                {{ Form::label('title') }}
                {{ Form::text('title', $category->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 ">
                {{ Form::label('Arabic title') }}
                {{ Form::text('title_ar', $category->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('description') }}
                {{ Form::textarea('description', $category->description, ['rows' => 4, 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic description') }}
                {{ Form::textarea('description_ar', $category->getTranslation('description', 'ar', false), ['rows' => 4, 'class' => 'form-control' . ($errors->has('description_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Description']) }}
                {!! $errors->first('description_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group my-4">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enable', 0 => 'Disable'], $category->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-4 d-flex justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('categories.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
