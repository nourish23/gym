<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;

use Carbon\Carbon;
use App\Models\Country;
use App\Models\Slider;
use App\Models\Page;
//use App\Models\Category;
use App\Models\Review;
use App\Models\Faq;
use App\Models\Config;
use App\Models\Coach;
use App\Models\Day;
use App\Models\Equipment;
use App\Models\Plan;
use App\Models\PlanClass;
use App\Models\ScheduledClass;
use App\Models\Service;
use App\Models\Week;
use App\Models\Meal;

use App\Http\Resources\WeekResource;
use App\Http\Resources\BodyMeasurementResource;
use App\Http\Resources\ClassResource;
use App\Http\Resources\CoachResource;
use App\Http\Resources\ConfigResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\DayResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\recordedScheduleResource;
use App\Http\Resources\ClassesScheduleResource;
use App\Http\Resources\MealsResource;

use App\Http\Requests\InitRequest;
use App\Models\Category;

class GeneralController extends BaseController
{

    /**
     * set initialization as fcm_token, device_id and all information in devices table.
     * set language, country and city
     *
     */
    public function initialization(InitRequest $request)
    {

        $data = null;
        $input = $request->only('fcm_token');
        // update device info
        $this->setFcmToken($input['fcm_token'], $request);

        return $this->sendResponse($data, 'Initialization successfully.');
        /*
        if (Auth::check()){
            $data = array();

            $data['city'] = 1;
            $data['language'] = 1;
            $data['is_blocked'] = 0;
                 */
    }


    /**
     * Update user or reguest device info.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function setFcmToken($fcmToken, Request $request)
    {
        $user      = $request->user();
        $fcmTokens = $user->fcm_token ?? [];

        if (!in_array($fcmToken, $fcmTokens)) {
            $fcmTokens[] = $fcmToken;
        }

        $user->update(['fcm_token' => $fcmTokens]);
        return true;
    }

    /**
     * get main settings.
     *
     *
     */
    public function getSettings(Request $request)
    {
        $settting = Config::all();
        if ($settting)
            return $this->sendResponse(ConfigResource::make($settting), 'Setting returned successfully.');
        else
            return $this->sendError('Not found setting.');
    }

    /**
     * get weeks list.
     *
     *
     */
    public function getWeeks(Request $request)
    {
        $meals = $request->user()->meal()->where('status', '1')->with('week')
            ->select('week_id')
            ->orderBy('week_id', 'desc')
            ->groupBy('week_id')->get();
        $weeksList = WeekResource::collection($meals);
        $data['weeks'] = $weeksList;
        $data['meals'] = Meal::where('week_id', $weeksList->first()->week->id)->where('user_id', $request->user()->id)->first(); //->dataMeals->where('status','1');


        $data['meals']  = MealsResource::make($data['meals']);

        return $this->sendResponse($data, 'Weeks list returned successfully.');
    }

    /**
     * get meals list of week.
     *
     *
     */
    public function getMeals($weekid, Request $request)
    {

        $meals = Meal::where('week_id', $weekid)->where('user_id', $request->user()->id)
            ->where('status', '1')->get();
        $data = MealsResource::collection($meals);

        return $this->sendResponse($data, 'Weeks list returned successfully.');
    }

    /**
     * Return coaches list.
     *
     *
     */
    public function coachList(Request $request)
    {
        $list = Coach::paginate(12);
        $data =  CoachResource::collection($list);
        return $this->sendResponse($data, 'Coaches retrieved successfully.');
        // return $this->sendResponsePaginate($data->response()->getData(true), 'Coaches retrieved successfully.');
    }

    /**
     * Return coache single.
     *
     *
     */
    public function getCoachById($id)
    {
        $coach = Coach::find($id);
        $data =  CoachResource::make($coach);
        return $this->sendResponse($data, 'Coaches retrieved successfully.');
        // return $this->sendResponsePaginate($data->response()->getData(true), 'Coaches retrieved successfully.');
    }

    public function countryList(Request $request)
    {
        $list = Country::paginate(12);
        $data =  CountryResource::collection($list);
        return $this->sendResponse($data, 'Countries retrieved successfully.');
        // return $this->sendResponsePaginate($data->response()->getData(true), 'Coaches retrieved successfully.');
    }

    /**
     * Return terms single.
     *
     *
     */
    public function getTermsandPrivacy()
    {
        $page = Page::find('1');
        $data['terms'] =  PageResource::make($page);
        $page = Page::find('2');
        $data['privacy'] =  PageResource::make($page);
        return $this->sendResponse($data, 'page retrieved successfully.');
    }

    /**
     * Return recordedClasses.
     *
     *
     */
    public function recordedClasses()
    {
        $user = auth()->user()->plan_id;
        $plan = Plan::findOrFail($user);
        $cat = Category::findOrFail($plan->category_id);
        if ($cat->title != "Nutrition") {
            $list =  PlanClass::where('class_type', '1')->orderBy('created_at', 'desc')->paginate(12);
            $data =  recordedScheduleResource::collection($list);
            return $this->sendResponse($data, ' recorded classes successfully.');
        } else {
            abort(403, 'You dont Have Permission');
        }
    }

    /**
     * Return recorded class single.
     *
     *
     */
    public function getRecordedClass($id)
    {
        $user = auth()->user()->plan_id;
        $plan = Plan::findOrFail($user);
        $cat = Category::findOrFail($plan->category_id);
        if ($cat->title != "Nutrition") {
            $class =  PlanClass::find($id);
            $data =  recordedScheduleResource::make($class);
            return $this->sendResponse($data, ' recorded class single successfully.');
        } else {
            abort(403, 'You dont Have Permission');
        }
    }

    /**
     * Return scheduleClasses.
     *
     *
     */
    public function scheduleClasses()
    {
        $user = auth()->user()->plan_id;
        $plan = Plan::findOrFail($user);
        $cat = Category::findOrFail($plan->category_id);
        if ($cat->title != "Nutrition") {
            $classes = ScheduledClass::where('status',1)->orderBy('created_at', 'desc')->get();
            $data = ClassesScheduleResource::collection($classes);
            return $this->sendResponse($data, 'Scheduled classes successfully.');
        } else {
            abort(403, 'You dont Have Permission');
        }
    }

    /**
     * Return get Schedule class single.
     *
     *
     */
    public function getScheduleClass($id)
    {
        $user = auth()->user()->plan_id;
        $plan = Plan::findOrFail($user);
        $cat = Category::findOrFail($plan->category_id);
        if ($cat->title != "Nutrition") {
            $class =  ScheduledClass::find($id);
            $data =  ClassesScheduleResource::make($class);
            return $this->sendResponse($data, ' Schedule class single successfully.');
        } else {
            abort(403, 'You dont Have Permission');
        }
    }
}
