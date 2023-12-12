<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class registerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation($validator)
    {
        throw new ValidationException($validator, $this->redirectRoute($validator));
    }

    public function redirectRoute($validator)
    {
         return  redirect()->route('user.register.form')
            ->withErrors($validator)
            ->withInput();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255|unique:users,phone_number',
            'age' => 'required',
            'do_you_have_anything_else_to_tell_us_about' => 'required|string|max:400',
            'how_did_you_hear_about_us' => 'required|string|max:400',
            'terms_and_conditions_acceptance' => 'required',
            'policy' => 'required',
            'diseases_symptoms' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            "services" => "required",
            "subscription" => "required"
        ];
    }
}
