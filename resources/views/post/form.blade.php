<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex mb-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('title') }}
                {{ Form::text('title', $post->title, ['required' => 'required', 'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('arabictitle') }}
                {{ Form::text('title_ar', $post->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-2">
                {{ Form::label('description') }}
                {{ Form::textarea('description', $post->description, ['rows' => 4, 'required' => 'required', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 ">
                {{ Form::label('arabic description') }}
                {{ Form::textarea('description_ar', $post->getTranslation('description', 'ar', false), ['rows' => 4, 'class' => 'form-control' . ($errors->has('description_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Description']) }}
                {!! $errors->first('description_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="form-group my-4">
            {{ Form::label('seo_meta_title') }}
            {{ Form::text('seo_meta_title', $post->seo_meta_title, ['required' => 'required', 'class' => 'form-control' . ($errors->has('seo_meta_title') ? ' is-invalid' : ''), 'placeholder' => 'Seo Meta Title']) }}
            {!! $errors->first('seo_meta_title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('seo_meta_text') }}
            {{ Form::text('seo_meta_text', $post->seo_meta_text, ['required' => 'required', 'class' => 'form-control' . ($errors->has('seo_meta_text') ? ' is-invalid' : ''), 'placeholder' => 'Seo Meta Text']) }}
            {!! $errors->first('seo_meta_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('seo_meta_keywords') }}
            {{ Form::text('seo_meta_keywords', $post->seo_meta_keywords, ['required' => 'required', 'class' => 'form-control' . ($errors->has('seo_meta_keywords') ? ' is-invalid' : ''), 'placeholder' => 'Seo Meta Keywords']) }}
            {!! $errors->first('seo_meta_keywords', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('image') }}
            {{ Form::file('image', null, ['accept' => 'image/*', 'required' => 'required', 'class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer d-flex justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('posts.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
