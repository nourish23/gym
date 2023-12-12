<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex mb4">
            <div class="form-group col-6 me-2">
                {{ Form::label('title') }}
                {{ Form::text('title', $meal->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('Arabic title') }}
                {{ Form::text('title_ar', $meal->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="form-group my-4">
            {{ Form::label('time') }}
            {{ Form::time('time', $meal->time, ['format' => 'h:i A', 'class' => 'form-control' . ($errors->has('time') ? ' is-invalid' : ''), 'placeholder' => 'Time']) }}
            {!! $errors->first('time', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @isset($user)
            {{ Form::hidden('user_id', $user->id) }}
        @else
            @if ($meal->user_id)
                {{ Form::hidden('user_id', $meal->user_id) }}
            @else
                <div class="form-group  my-4">
                    {{ Form::label('user') }}
                    {{ Form::select('user_id', $data['userOptions'], $meal->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
                    {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            @endif
        @endisset
        <div class="form-group  my-4">
            {{ Form::label('week ') }}
            {{ Form::select('week_id', $data['weeks'], $meal->week_id, ['class' => 'form-control' . ($errors->has('week_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
            {!! $errors->first('week_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group  my-4">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enable', 0 => 'Disenable'], $meal->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-4 d-flex justify-content-end">
        <a class="btn btn-secondary me-1" href="{{ route('meals.index') }}"> {{ __('Back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
