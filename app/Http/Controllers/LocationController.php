<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\location;

class LocationController extends Controller
{
    public function showMap()
    {
    	$count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = DB::table('user_inspects')->count();
        return view('location',compact('count_admin','count_stuff','count_security','count_inspection'));
    }
    public function addMap(request $request)
    {
    	$location = new location([
        'longtitude' => $request->get('longtitude'),
        'latitude'=> $request->get('latitude'),
        'location_name'=> $request->get('location_name'),
        'created_at'=>date('Y-m-d'),
    	]);
    	$location->save();
      return back()->withStatus(__('location successfully added.'));
    }
}
