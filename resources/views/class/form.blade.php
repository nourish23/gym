<div class="box box-info padding-1">
    <div class="box-body d-flex flex-column">
        <div class="d-flex mb-3">
            <div class=" col-6 form-group pe-1">
                {{ Form::label('title') }}
                {{ Form::text('title', $class->title, ['required' => 'required', 'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class=" col-6 form-group">
                {{ Form::label('arabic title ') }}
                {{ Form::text('title_ar', $class->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-3">
            <div class=" col-6 form-group pe-1">
                {{ Form::label('description') }}
                {{ Form::textarea('description', $class->description, ['rows' => 5, 'required' => 'required', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class=" col-6 form-group">
                {{ Form::label('arabic description') }}
                {{ Form::textarea('description_ar', $class->getTranslation('description', 'ar', false), ['rows' => 5, 'class' => 'form-control' . ($errors->has('description_ar') ? ' is-invalid' : ''), 'placeholder' => 'arabic Description']) }}
                {!! $errors->first('description_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>


        <div class="col-12 form-group my-3">
            {{ Form::label('thumbnail ') }}
            {{ Form::file('thumbnail_url', null, ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('thumbnail_url') ? ' is-invalid' : ''), 'placeholder' => 'Thumbnail Url']) }}
            {!! $errors->first('thumbnail_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-4 d-flex justify-content-end ">
        <a class="btn btn-secondary me-1" href="{{ route('class.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
