<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\NotificationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


// public routes
Route::prefix('users/auth')->middleware(['cors', 'json.response'])->controller(ApiAuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login.api');
    Route::post('/register', 'register')->name('register.api');
    Route::post('/forgot_password', 'sendResetLinkEmail');
});

Route::prefix('common')->middleware(['cors', 'json.response' , 'auth:api' , 'localization'])->controller(GeneralController::class)->group(function () {
    Route::get('/coachlist', 'coachList')->name('coachList.api');
    Route::get('/coach/{id}', 'getCoachById')->name('getcoachbyid.api');
    Route::get('/termsandprivacy', 'getTermsandPrivacy')->name('termsandprivacy.api');
    Route::get('/countrylist', 'countryList')->name('countryList.api');
    Route::get('/recorded/class', 'recordedClasses')->name('recordedclass.api');
    Route::get('/recorded/class/{id}', 'getRecordedClass')->name('getrecordedclass.api');
    Route::get('/schedule/class', 'scheduleClasses')->name('scheduleclass.api');
    Route::get('/schedule/class/{id}', 'getScheduleClass')->name('getscheduleclass.api');
    Route::post('/initialization', 'initialization')->name('initialization.api');
    Route::get('/weeks', 'getWeeks')->name('weeks.api');
    Route::get('/meals/{id}', 'getMeals')->name('meals.api');
  
});

Route::prefix('notifications')->middleware(['cors', 'json.response' , 'auth:api' , 'localization'])->controller(NotificationController::class)->group(function () {
    Route::get('/sendnotification', 'sendOfferNotification')->name('sendOfferNotification.api');
    Route::get('/list', 'usernotificationslist')->name('usernotificationslist.api');
    Route::get('/markread/{notificationId}', 'markNotificationRead')->name('markread.api');
    Route::get('/markallread', 'markNotificationsReadAll')->name('markNotificationsReadAll.api');
    
  
});

Route::prefix('users/auth')->middleware(['cors', 'json.response' , 'auth:api' , 'localization'])->controller(ApiAuthController::class)->group(function () {
    // our routes to be protected will go in here
    Route::get('/profile', 'profile')->name('profile.api');
    Route::get('/bodymeasurements', 'getBodyMeasurement');
    Route::post('/add/measurements', 'addBodyMeasurement');
    Route::post('/logout', 'logout')->name('logout.api');
});
