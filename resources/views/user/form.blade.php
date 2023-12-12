<div class="box box-info padding-1">
    <div class="box-body  ">
        <div class="d-flex mb-4">
            <div class="form-group col-6 pe-1">
                {{ Form::label('first_name') }}
                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
                {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('last_name') }}
                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
                {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 pe-1">
                {{ Form::label('phone_number') }}
                {{ Form::text('phone_number', $user->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number']) }}
                {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('age') }}
                {{ Form::number('age', $user->age, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group  col-6 me-1">
                {{ Form::label('email') }}
                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 pe-1 ">
                {{ Form::label('Total Class') }}
                {{ Form::text('total_class', $user->total_class, ['class' => 'form-control' . ($errors->has('total_class') ? ' is-invalid' : ''), 'placeholder' => 'Total Class']) }}
                {!! $errors->first('total_class', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 pe-1 ">
                {{ Form::label('is_active') }}
                {{ Form::select('is_active', [1 => 'active', 0 => 'inactive'], $user->is_active, ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {!! $errors->first('is_active', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 ">
                {{ Form::label('is_paid') }}
                {{ Form::select('is_paid', [1 => 'paid', 0 => 'unpaid'], $user->is_paid, ['class' => 'form-control' . ($errors->has('is_paid') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {!! $errors->first('is_paid', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <hr>
        <h4>General Information</h4>
        <div class="d-flex my-4">
            <div class="form-group col-6" style="margin-right: 4px;">
                {{ Form::label('terms_and_conditions_acceptance') }}
                {{ Form::select('terms_and_conditions_acceptance', [1 => 'Yes', 0 => 'No'], $user->terms_and_conditions_acceptance, ['class' => 'form-control' . ($errors->has('terms_and_conditions_acceptance') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {!! $errors->first('terms_and_conditions_acceptance', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 ">
                {{ Form::label('how_did_you_hear_about_us') }}
                {{ Form::text('how_did_you_hear_about_us', $user->how_did_you_hear_about_us, ['class' => 'form-control' . ($errors->has('how_did_you_hear_about_us') ? ' is-invalid' : ''), 'placeholder' => 'How Did You Hear About Us']) }}
                {!! $errors->first('how_did_you_hear_about_us', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6" style="margin-right: 4px;">
                {{ Form::label('diseases_symptoms') }}
                {{ Form::text('diseases_symptoms', $user->diseases_symptoms, ['class' => 'form-control' . ($errors->has('diseases_symptoms') ? ' is-invalid' : ''), 'placeholder' => 'Diseases Symptoms']) }}
                {!! $errors->first('diseases_symptoms', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 ">
                {{ Form::label('health_problems') }}
                {{ Form::text('health_problems', $user->health_problems, ['class' => 'form-control' . ($errors->has('health_problems') ? ' is-invalid' : ''), 'placeholder' => 'Health Problems']) }}
                {!! $errors->first('health_problems', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6" style="margin-right: 4px;">
                {{ Form::label('food_disliked') }}
                {{ Form::text('food_disliked', $user->food_disliked, ['class' => 'form-control' . ($errors->has('food_disliked') ? ' is-invalid' : ''), 'placeholder' => 'Food Disliked']) }}
                {!! $errors->first('food_disliked', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 ">
                {{ Form::label('food_allergies') }}
                {{ Form::text('food_allergies', $user->food_allergies, ['class' => 'form-control' . ($errors->has('food_allergies') ? ' is-invalid' : ''), 'placeholder' => 'Food Allergies']) }}
                {!! $errors->first('food_allergies', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6" style="margin-right: 4px;">
                {{ Form::label('supplements_taken') }}
                {{ Form::text('supplements_taken', $user->supplements_taken, ['class' => 'form-control' . ($errors->has('supplements_taken') ? ' is-invalid' : ''), 'placeholder' => 'Supplements Taken']) }}
                {!! $errors->first('supplements_taken', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6 ">
                {{ Form::label('do_you_have_anything_else_to_tell_us_about') }}
                {{ Form::text('do_you_have_anything_else_to_tell_us_about', $user->do_you_have_anything_else_to_tell_us_about, ['class' => 'form-control' . ($errors->has('do_you_have_anything_else_to_tell_us_about') ? ' is-invalid' : ''), 'placeholder' => 'Do You Have Anything Else To Tell Us About']) }}
                {!! $errors->first('do_you_have_anything_else_to_tell_us_about', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <hr>
        <h4>Subscription renewal</h4>
        <div class="d-flex my-4">
            <div class="form-group col-6 pe-1 ">
                {{ Form::label('is new subscription') }}
                {{ Form::select('is_new_subscription', [1 => 'Yes', 0 => 'No'], 0, ['class' => 'form-control' . ($errors->has('is_new') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {{-- {{ Form::label('subscription_end_date') }}
                {{ Form::date('subscription_end_date', Carbon\Carbon::parse($user->subscription_end_date)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {!! $errors->first('is_active', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
        </div>
        <div class="d-flex my-4">
            <div class="form-group col-6 pe-1">
                {{ Form::label('Plan ') }}
                {{ Form::select('category_id', $categories, $user->plan->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('subscription Period') }}
                {{ Form::select('period', $periods, $user->plan->period, ['class' => 'form-control' . ($errors->has('period') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                {!! $errors->first('period', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>
    <div class="box-footer mt-4 d-flex ">
        <button type="submit" class="btn btn-primary ms-auto">{{ __('Submit') }}</button>
    </div>
</div>
