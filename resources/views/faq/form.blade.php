<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group mb-4">
            {{ Form::label('question') }}
            {{ Form::text('question', $faq->question, ['class' => 'form-control' . ($errors->has('question') ? ' is-invalid' : ''), 'placeholder' => 'Question']) }}
            {!! $errors->first('question', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('answer') }}
            {{ Form::text('answer', $faq->answer, ['class' => 'form-control' . ($errors->has('answer') ? ' is-invalid' : ''), 'placeholder' => 'Answer']) }}
            {!! $errors->first('answer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{--  <div class="form-group my-4">
            {{ Form::label('status') }}
            {{ Form::select('status',  [1 => 'Enable', 0 => 'Disable'], $faq->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>  --}}

    </div>
    <div class="box-footer mt-4 d-flex">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>
</div>