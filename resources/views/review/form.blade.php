<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-4">
            {{ Form::label('name') }}
            {{ Form::text('name', $review->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enable', 0 => 'Disable'], $review->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group my-4">
            {{ Form::label('Content') }}
            {{ Form::textarea('text', $review->text, ['class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
            {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group my-4  d-flex flex-column">
            {{ Form::label('image') }}
            {{ Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
    </div>
    <div class="box-footer d-flex mt-5">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>
</div>
