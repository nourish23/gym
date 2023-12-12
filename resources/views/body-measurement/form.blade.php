<div class="box box-info padding-1">
    <div class="box-body">
        <div class="d-flex my-4">

            <div class="form-group col-6 me-1">
                {{ Form::label('weight') }}
                {{ Form::number('weight', $bodyMeasurement->weight, ['class' => 'form-control' . ($errors->has('weight') ? ' is-invalid' : ''), 'placeholder' => 'Weight']) }}
                {!! $errors->first('weight', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('height') }}
                {{ Form::number('height', $bodyMeasurement->height, ['class' => 'form-control' . ($errors->has('height') ? ' is-invalid' : ''), 'placeholder' => 'Height']) }}
                {!! $errors->first('height', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-1">
                {{ Form::label('chest') }}
                {{ Form::number('chest', $bodyMeasurement->chest, ['class' => 'form-control' . ($errors->has('chest') ? ' is-invalid' : ''), 'placeholder' => 'Chest']) }}
                {!! $errors->first('chest', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('waist') }}
                {{ Form::number('waist', $bodyMeasurement->waist, ['class' => 'form-control' . ($errors->has('waist') ? ' is-invalid' : ''), 'placeholder' => 'Waist']) }}
                {!! $errors->first('waist', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-1">
                {{ Form::label('abs') }}
                {{ Form::number('abs', $bodyMeasurement->abs, ['class' => 'form-control' . ($errors->has('abs') ? ' is-invalid' : ''), 'placeholder' => 'Abs']) }}
                {!! $errors->first('abs', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('hips') }}
                {{ Form::number('hips', $bodyMeasurement->hips, ['class' => 'form-control' . ($errors->has('hips') ? ' is-invalid' : ''), 'placeholder' => 'Hips']) }}
                {!! $errors->first('hips', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-1">
                {{ Form::label('left_thigh') }}
                {{ Form::number('left_thigh', $bodyMeasurement->left_thigh, ['class' => 'form-control' . ($errors->has('left_thigh') ? ' is-invalid' : ''), 'placeholder' => 'Left Thigh']) }}
                {!! $errors->first('left_thigh', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('right_thigh') }}
                {{ Form::number('right_thigh', $bodyMeasurement->right_thigh, ['class' => 'form-control' . ($errors->has('right_thigh') ? ' is-invalid' : ''), 'placeholder' => 'Right Thigh']) }}
                {!! $errors->first('right_thigh', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 me-1">
                {{ Form::label('left_arm') }}
                {{ Form::number('left_arm', $bodyMeasurement->left_arm, ['class' => 'form-control' . ($errors->has('left_arm') ? ' is-invalid' : ''), 'placeholder' => 'Left Arm']) }}
                {!! $errors->first('left_arm', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('right_arm') }}
                {{ Form::number('right_arm', $bodyMeasurement->right_arm, ['class' => 'form-control' . ($errors->has('right_arm') ? ' is-invalid' : ''), 'placeholder' => 'Right Arm']) }}
                {!! $errors->first('right_arm', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        @if (is_null($bodyMeasurement->user_id))
            {{ Form::hidden('user_id', $userID) }}
        @endif
    </div>
    <div class="box-footer mt-4 d-flex">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>
</div>
