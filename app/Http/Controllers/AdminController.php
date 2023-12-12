<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\PlanClass;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("YEAR(created_at)"), DB::raw("MONTHNAME(created_at)"))
            ->pluck('count', 'month_name');
    
        $labels = $users->keys();
        $data = $users->values();
    
        $usersPaidCount = User::where('is_paid', 1)->count();
        $usersUnpaidCount = User::where('is_paid', 0)->count();
    
        $planClassData = PlanClass::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("YEAR(created_at)"), DB::raw("MONTHNAME(created_at)"))
            ->pluck('count', 'month_name');
    
        $planClassLabels = $planClassData->keys();
        $planClassData = $planClassData->values();
        $usercount=User::count();
        $recordedcount=PlanClass::count();
        $coachcount=Coach::count();
        $subcount= User::whereDate('subscription_end_date', Carbon::now()->addDays(3))->count();
        return view('admin', compact('subcount','coachcount','recordedcount','usercount','labels', 'data', 'usersPaidCount', 'usersUnpaidCount', 'planClassLabels', 'planClassData'));
    }
    
    
}

