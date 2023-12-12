<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registerRequest;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Category;
use App\Models\Review;
use App\Models\Coach;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPlanRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeEmail;
use App\Models\Classes;
use App\Models\Faq;
use Illuminate\Support\Facades\Mail;

//use InstagramScraper\Instagram;
//use Phpfastcache\Helper\Psr16Adapter;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //  $this->middleware('auth');
  }
  function fetchData($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {
    $data = null;

    $data['coaches'] = Coach::all();
    $data['reviews'] = Review::where('status', '1')->get();
    $data['services'] = Service::all();
    $data['categories'] = Category::all();
    $data['classes'] = Classes::get();
    $data['plans'] = Plan::get();

    return view('index', compact('data'));
  }

  public function userregister(Request $request)
  {
    $data = null;
    $data['countries'] = Country::all();

    return view('userregister', compact('data'));
  }

  public function newRegister(registerRequest $request)
  {
    $data = null;
    $lang = $request->lang;
    if ($lang == null) $lang = 'en';

    $plan = Plan::where('category_id', $request->services)->where('period', $request->subscription)->first();
    $user = $request->validated();
    $user = User::create([
      'first_name' => $user['first_name'],
      'last_name' => $user['last_name'],
      'phone_number' => $user['phone_number'],
      'age' => $user['age'],
      'do_you_have_anything_else_to_tell_us_about' => $user['do_you_have_anything_else_to_tell_us_about'],
      'how_did_you_hear_about_us' => $user['how_did_you_hear_about_us'],
      'diseases_symptoms' => $user['diseases_symptoms'],
      'email' => $user['email'],
      'password' => bcrypt($user['password']),
      'services' => $user['services'],
      'subscription' => $user['subscription'],
      'plan_id' => $plan->id,
      'terms_and_conditions_acceptance' => ($request->terms_and_conditions_acceptance == 'on') ? 1 : 0,
      'policy' => ($request->policy == 'on') ? 1 : 0,
      'subscription_history' => [$plan->period],
      "subscription_start_date" => Carbon::now()->toDateString(),
      'subscription_end_date'   => Carbon::now()->addMonths($plan->period)->addDays(7)->toDateString(),

    ]);

    UserPlanRequest::create([
      "user_id" => $user->id,
      "plan_id" => $plan->id
    ]);

    Mail::to($user->email)->send(new WelcomeEmail());

    return redirect('/');
  }

  public function authenticated(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required',
      'password' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()->all()], 422);
    }

    $response = Http::post('https://nourishfitness.net/api/users/auth/login', [
      'email' => $request->email,
      'password' => $request->password,
    ]);

    if ($response->ok()) {
      $data = $response->json();
      $token = $data['token'];
      $userData = $data['data'];

      $request->session()->put('token', $token);

      return response()->json(['success' => true, 'data' => $userData]);
    } else {
      return response()->json(['errors' => ['Invalid email or password']], $response->status());
    }
  }

  function logout(Request $request)
  {
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }

  public function showPost(Request $request, $slug)
  {
    $post = Post::find($slug);
    return view('post', compact('post'));
  }

  public function blog(Request $request)
  {
    $posts = Post::paginate(10);
    return view('blog', compact('posts'));
  }

  public function privacy()
  {
    return view('auth.privacy');
  }

  public function faq()
  {
    $faqs = Faq::where('status', true)->get();
    return view('fqa', compact('faqs'));
  }
}
