<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersPlansController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('usersplans.index', compact(['users']));
    }
    public function edit($id)
    {

        $user=User::where('id',$id)->first();
       // dd($user);
        $user_plan=Plan::where('id',$user->plan_id)->first();
        $user_cat=Category::where('id',$user_plan->category_id)->first();
      $plans=Plan::all();

        return view('usersplans.edit', compact(['user','user_plan','plans','user_cat']));
    }

    public function update(Request $request,$id)
    {

        $user=User::where('id',$id)->first();
        $plan=Plan::where('id',$request->plan)->first();


        $subscription_end_date=$request->subscription_end_date;
        $subscription_start_date=$request->subscription_start_date;

        $data['is_paid']=$request->is_paid;
        $data['is_active']=$request->is_active;
        $data['subscription_end_date']=$subscription_end_date;
        $data['subscription_start_date']=$subscription_start_date;
        $data['plan_id']=$plan->id;
        $user->update($data);
        return  back();
    }
}
