<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex mb-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('title') }}
                {{ Form::text('title', $service->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('arabic title') }}
                {{ Form::text('title_ar', $service->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-3">
            <div class="form-group col-6 me-2">
                {{ Form::label('text') }}
                {{ Form::textarea('text', $service->text, ['class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
                {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('arabic text') }}
                {{ Form::textarea('text_ar',  $service->getTranslation('text', 'ar', false), ['class' => 'form-control' . ($errors->has('text_ar') ? ' is-invalid' : ''), 'placeholder' => ' Arabic Text']) }}
                {!! $errors->first('text_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-3">
            <div class="form-group col-6 me-2">
                {{ Form::label('price') }}
                {{ Form::number('price', $service->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
                {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 d-flex flex-column">
                {{ Form::label('image') }}
                {{ Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer d-flex justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('services.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary ">{{ __('Submit') }}</button>
    </div>
</div>
