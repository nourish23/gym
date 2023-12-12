<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex mb-3">
            <div class="form-group col-6 me-2">
                {{ Form::label( 'name') }}
                {{ Form::text('name', $coach->name, ['required' => 'required', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic name') }}
                {{ Form::text('name_ar', $coach->getTranslation('name', 'ar', false), ['class' => 'form-control' . ($errors->has('name_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Name']) }}
                {!! $errors->first('name_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-3">
            <div class="form-group col-6 me-2">
                {{ Form::label('brief') }}
                {{ Form::textarea('brief', $coach->brief, ['rows' => 4, 'required' => 'required', 'class' => 'form-control' . ($errors->has('brief') ? ' is-invalid' : ''), 'placeholder' => 'Brief']) }}
                {!! $errors->first('brief', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic  brief') }}
                {{ Form::textarea('brief_ar', $coach->getTranslation('brief', 'ar', false), ['rows' => 4 , 'class' => 'form-control' . ($errors->has('brief_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Brief']) }}
                {!! $errors->first('brief_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="d-flex my-3">
            <div class="form-group col-6 me-2">
                {{ Form::label('description') }}
                {{ Form::textarea('description', $coach->description, ['rows' => 4, 'required' => 'required', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic description') }}
                {{ Form::textarea('description_ar', $coach->getTranslation('description', 'ar', false),  ['rows' => 4, 'class' => 'form-control' . ($errors->has('description_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Description']) }}
                {!! $errors->first('description_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group my-3">
            {{ Form::label('image ') }}
            {{ Form::file('image_url', null, ['accept' => 'image/*', 'required' => 'required', 'class' => 'form-control' . ($errors->has('image_url') ? ' is-invalid' : ''), 'placeholder' => 'Image Url']) }}
            {!! $errors->first('image_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-4 d-flex justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('coachs.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
