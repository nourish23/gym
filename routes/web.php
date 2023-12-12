<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ConfigValueController;
use App\Http\Controllers\NutritionPlanController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\BodyMeasurementController;
use App\Http\Controllers\ManageNotificationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ScheduledClassController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanClassesEquipmentController;
use App\Http\Controllers\PlanClassController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserPlanRequestController;
use App\Http\Controllers\UserServiceController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\DataMealController;
use App\Http\Controllers\CategoryController;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\Controller;
use App\Services\FireBaseServices;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/change-language/{lang}', [Controller::class, 'changeLang']);

Route::group(['middleware' => 'web'], function () {
    Route::get('/test', function(){
        (new FireBaseServices())->push(
            "classes",
            ["Devices"],
        );    }) ;

    Route::auth();
    Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
    Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');


    Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
    Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth:admin');

    Route::get('/userregister', [App\Http\Controllers\HomeController::class, 'userregister'])->name('user.register.form');
    Route::post('/postregister', [App\Http\Controllers\HomeController::class, 'newRegister']);
    Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy-policy');



    Route::get('/signin', [App\Http\Controllers\HomeController::class, 'signin']);
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);
    Route::post('/authenticated', [App\Http\Controllers\HomeController::class, 'authenticated'])->name('authenticated');

    // Moving here will ensure that sessions, csrf, etc. is included in all these routes
    Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {

        Route::resource('users', UserController::class);
        Route::resource('body-measurements', BodyMeasurementController::class);
        Route::resource('coachs', CoachController::class);
        // Route::resource('configs', ConfigController::class);
        Route::resource('configvalues', ConfigValueController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('days', DayController::class);
        Route::resource('email-templates', EmailTemplateController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('manage-notifications', ManageNotificationController::class);
        Route::post('manage-notifications/send-notification', [ManageNotificationController::class, 'sendNotification'])->name('manage-notifications.send-notification');
        Route::resource('newsletters', NewsletterController::class);
        Route::resource('nutrition-plans', NutritionPlanController::class);
        Route::resource('pages', PageController::class);
        Route::resource('planclasses', PlanClassController::class);
        Route::resource('equipments', EquipmentController::class);
        Route::resource('planclassesequipments', PlanClassesEquipmentController::class);
        Route::resource('plans', PlanController::class);
        Route::resource('class', ClassesController::class);
        Route::resource('reviews', ReviewController::class);
        Route::resource('scheduled-classes', ScheduledClassController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('sliders', SliderController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('userplanrequests', UserPlanRequestController::class);
        Route::resource('userservices', UserServiceController::class);
        Route::resource('posts', PostController::class);
        Route::resource('weeks', WeekController::class);
        Route::resource('meals', MealController::class);
        Route::resource('data-meals', DataMealController::class);
        Route::resource('categories', CategoryController::class);

        Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
            Route::get('/create/{filter?}', 'getUsers')->name("all.filter");
            Route::get('/datatable/all/{filter?}', 'getUsers')->name("data-table");
            Route::get('/{id}/body/measurements', 'getUserMeasurements')->name("body.measurements");
            Route::get('/{id}/nutrition/plan/{week_id?}', 'getUserNutritionPlan')->name("nutrition.plan");
            Route::get('/{id}/meals', 'getUserMeals')->name("meals");
        });

        Route::prefix('users')->controller(NutritionPlanController::class)->name('nutrition.plan.')->group(function () {
            Route::get('/{id}/nutrition-plan/create', 'creationView')->name("create");
        });

        Route::prefix('measurements')->controller(BodyMeasurementController::class)->name('body.measurements.')->group(function () {
            Route::get('/{id}/body-measurements/create', 'creationView')->name("create");
        });

        Route::prefix('meal')->controller(MealController::class)->name('meal.')->group(function () {
            Route::get('/{id}/meal/create', 'creationView')->name("creation");
            Route::post('/import', 'import')->name('import');
        });


        Route::prefix('data-meal')->controller(DataMealController::class)->name('data.meals.')->group(function () {
            Route::get('/{id}/data-meal/create', 'creationView')->name("creation");
        });


        Route::get('/users-plans', [App\Http\Controllers\UsersPlansController::class, 'index']);
        Route::get('/users-plans-edit/{id}', [App\Http\Controllers\UsersPlansController::class, 'edit']);
        Route::post('/users-plans-update/{id}', [App\Http\Controllers\UsersPlansController::class, 'update'])->name('usersplans.update');


    });
});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware("cors");
Route::get('home/lang', [App\Http\Controllers\HomeController::class, 'index'])->name('LangChange')->middleware("cors");
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/post/{slug}', [App\Http\Controllers\HomeController::class, 'showPost'])->name('post');
