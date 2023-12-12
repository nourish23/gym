<div class="box box-info padding-1">
    <div class="box-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex mb-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('title') }}
                {{ Form::text('title', $slider->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic title') }}
                {{ Form::text('title_ar', $slider->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('content') }}
                {{ Form::textarea('text', $slider->text, ['rows' => 5, 'class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
                {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic content') }}
                {{ Form::textarea('text_ar', $slider->getTranslation('text', 'ar', false), ['rows' => 5, 'class' => 'form-control' . ($errors->has('text_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic content']) }}
                {!! $errors->first('text_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="d-flex my-4 ">
            <div class="col-6 form-group me-2">
                {{ Form::label('is_clickable') }}
                {{ Form::select('is_clickable', [1 => 'Yes', 0 => 'No'], $slider->is_clickable, ['class' => 'form-control' . ($errors->has('is_clickable') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('is_clickable', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6 form-group">
                {{ Form::label('target_blank') }}
                {{ Form::select('target_blank', [1 => 'Yes', 0 => 'No'], $slider->target_blank, ['class' => 'form-control' . ($errors->has('target_blank') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                {!! $errors->first('target_blank', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex align-items-center my-4">
            <div class="form-group col-6 me-2 ">
                {{ Form::label('url') }}
                {{ Form::text('url', $slider->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
                {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6 form-group  d-flex flex-column">
                {{ Form::label('image ') }}
                {{ Form::file('image_url', null, ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('image_url') ? ' is-invalid' : ''), 'placeholder' => 'Image Url']) }}
                {!! $errors->first('image_url', '<div class="invalid-feedback">:message</div>') !!}
             </div>
        </div>

    </div>
    <div class="box-footer mt-4 d-flex justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('sliders.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary ">{{ __('Submit') }}</button>
    </div>
</div>
