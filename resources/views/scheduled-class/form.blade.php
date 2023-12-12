<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group my-3">
            {{ Form::label('plan_class') }}
            {{ Form::select('plan_class_id', $planClasses, $scheduledClass->plan_class_id, ['class' => 'form-control' . ($errors->has('plan_class_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
            {!! $errors->first('plan_class_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-3">
            {{ Form::label('day ') }}
            {{ Form::select('day_id', $days, $scheduledClass->day_id, ['class' => 'form-control' . ($errors->has('day_id') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
            {!! $errors->first('day_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-3">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Enable', 0 => 'Disable'], $scheduledClass->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'select...']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-3">
            {{ Form::label('url') }}
            {{ Form::text('url', $scheduledClass->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="d-flex">
            <div class="col-6 form-group my-3 pe-1">
                {{ Form::label('start_time') }}
                {{ Form::input('datetime-local', 'start_time', \Carbon\Carbon::parse($scheduledClass->start_time)->setTimezone($timezone)->format('Y-m-d H:i:s'), ['id' => 'start_time', 'class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''), 'placeholder' => 'Start Time']) }}
                {!! $errors->first('start_time', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6 form-group my-3">
                {{ Form::label('end_time') }}
                {{ Form::input('datetime-local', 'end_time',  \Carbon\Carbon::parse($scheduledClass->end_time)->setTimezone($timezone)->format('Y-m-d H:i:s'), ['class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : ''), 'placeholder' => 'End Time']) }}
                {!! $errors->first('end_time', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <input type="hidden" name="start_time_utc" id="start_time_utc">
        <input type="hidden" name="end_time_utc" id="end_time_utc">

    </div>
    <div class="box-footer mt-5 d-flex">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>

    <script>
        document.getElementById('scheduled_class_form').addEventListener('submit', function(event) {
            // Get the selected datetime from the input
            let startTimeInput = document.getElementById('start_time').value;
            let endTimeInput   = document.getElementById('end_time').value;

            // Create a new Date object from the selected datetime (in the user's timezone)
            let startTime = new Date(startTimeInput);
            let endTime   = new Date(endTimeInput);

            // Set the UTC datetime as the input value
            document.getElementById('start_time_utc').value = startTime.toISOString();
            document.getElementById('end_time_utc').value   = endTime.toISOString();
        });
    </script>
</div>
