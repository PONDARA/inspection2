<?php

namespace App\Http\Controllers;
use App\Model\User_inspect;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = DB::table('user_inspects')->count();
        $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->select('user_inspects.*','users.name')->get();
        $inspectors = DB::table('user_inspects')->join('users','users.id','=','user_inspects.inspector_id')->select('user_inspects.*','users.name')->get();
        $countarray=count($guards);
        // dd($inspectors);
        return view('dashboard',compact('count_admin','count_security','count_stuff','count_inspection','countarray','guards','inspectors'));
    }
}
