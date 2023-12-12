<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-4">
            {{ Form::label('title') }}
            {{ Form::text('title', $manageNotification->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('text') }}
            {{ Form::textarea('text', $manageNotification->text, ['rows' => 4, 'class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
            {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('before_days_num') }}
            {{ Form::number('before_days_num', $manageNotification->before_days_num, ['class' => 'form-control' . ($errors->has('before_days_num') ? ' is-invalid' : ''), 'placeholder' => 'Before Days Num']) }}
            {!! $errors->first('before_days_num', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('type') }}
            {{ Form::select('type',["email"=>"Email", "notification"=>"Notification","email_and_notification" =>"Email and Notification"],  $manageNotification->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'select ...']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('day_id') }}
            {{ Form::select('day_id', $days,  $manageNotification->day_id, ['class' => 'form-control' . ($errors->has('day_id') ? ' is-invalid' : ''), 'placeholder' => 'select ...']) }}
            {!! $errors->first('day_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('email_template_id') }}
            {{ Form::select('email_template_id', $emailTemplates,  $manageNotification->email_template_id, ['class' => 'form-control' . ($errors->has('email_template_id') ? ' is-invalid' : ''), 'placeholder' => 'select ...']) }}
            {!! $errors->first('email_template_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('status') }}
            {{ Form::select('status',[1 =>"Enabled", 0 =>"Disenabled"], $manageNotification->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'select ...']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer d-flex mt-4">
        <button type="submit" class="ms-auto btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
