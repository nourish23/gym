<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\BodyMeasurement;
use App\Http\Resources\UserResource;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Password;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'birthday' => 'required',
            'diseases_symptoms' => 'required|string|max:400',
            'health_problems' => 'required|string|max:400',
            'food_disliked' => 'required|string|max:400',
            'food_allergies' => 'required|string|max:400',
            'supplements_taken' => 'required|string|max:400',
            'do_you_have_anything_else_to_tell_us_about' => 'required|string|max:400',
            'how_did_you_hear_about_us' => 'required|string|max:400',
            'terms_and_conditions_acceptance' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $input = $request->only('first_name', 'last_name', 'phone_number', 'birthday', 'diseases_symptoms', 'health_problems', 'food_disliked', 'food_allergies', 'supplements_taken', 'do_you_have_anything_else_to_tell_us_about', 'how_did_you_hear_about_us', 'terms_and_conditions_acceptance', 'email', 'password');

        $input['password'] = Hash::make($input['password']);
        $input['remember_token'] = Str::random(10);
        $user = User::create($input);
        $token = $user->createToken('my_app_gym')->accessToken;
        //     new NotificationController()->sendWelcomeNotification();
        $response = ['token' => $token];

        return response($response, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $input = $request->only('email', 'password');

        $user = User::where('email', $input['email'])->first();
        if ($user) {
            if (Hash::check($input['password'], $user->password)) {

                $response['token'] = $user->createToken('my_app_gym')->accessToken;
                $response['data'] = UserResource::make($user);
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }

    public function profile(Request $request)
    {
        $token = $request->user()->token();

        $response = ['data' => UserResource::make($request->user()), 'message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }


    public function getBodyMeasurement(Request $request)
    {
        $data = $request->user()->bodymeasurement;
        $response = ['message' => 'You have been successfully get BodyMeasurements.', 'data' => $data];
        return response($response, 200);
    }

    public function addBodyMeasurement(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'weight' => 'required',
            'height' => 'required',
            'chest' => 'nullable',
            'waist' => 'nullable',
            'abs' => 'nullable',
            'hips' => 'nullable',
            'left_thigh' => 'nullable',
            'right_thigh' => 'nullable',
            'left_arm' => 'nullable',
            'right_arm' => 'nullable',
            'created_at' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $input = $request->only('weight', 'height', 'chest', 'waist', 'abs', 'hips', 'left_thigh', 'right_thigh', 'left_arm', 'right_arm', 'created_at');
        $input['user_id'] = $request->user()->id;
        if ($request->has('id')) {
            $bodymeasurement = BodyMeasurement::where('id', $request->id)->first();
            if ($bodymeasurement)
                $bodymeasurement->update($input);
            else
                return response(["message" => 'Body measurement does not exist'], 422);
        } else {
            $bodymeasurement = BodyMeasurement::create($input);
        }

        $response = ['message' => 'You have been successfully save BodyMeasurements.', 'data' => $bodymeasurement];
        return response($response, 200);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email']);

        if ($validator->fails()) {
            return response(['message' => $validator->errors()->all()], 422);
        }

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Password reset link sent to your email'])
            : response()->json(['error' => 'Unable to send reset link. Please try again later.'], 422);
    }

    protected function broker()
    {
        return Password::broker('users');
    }
}
