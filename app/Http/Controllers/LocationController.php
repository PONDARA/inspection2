<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\location;
use App\User;

class LocationController extends Controller
{
    public function showMap()
    {
    	$count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->count();
        $locations = DB::table('locations')->paginate(10);
        // dd($locations);
        $users = User::where('user_type_id',3)->get();
        if($users->count() > 0){
            foreach ($users as $user) {
                $data[] = $user->location_id;
            }
            $availables = Location::select('location_id')->orderBy('location_id', 'asc')->whereNotIn('location_id', $data)->get();
            // dd($availables);
        }
            else{
                $availables = $locations;
            }
        return view('location',compact('count_admin','count_stuff','count_security','count_inspection','locations','availables'));
    }
    public function addMap(request $request)
    {
    	$location = new location([
        'longtitude' => $request->get('longtitude'),
        'latitude'=> $request->get('latitude'),
        'location_name'=> $request->get('location_name'),
        'location_search' =>$request->get('location_search'),
        'created_at'=>date('Y-m-d'),
    	]);
    	$location->save();
      return back()->withStatus(__('location successfully added.'));
    }
    public function editLocation(request $request)
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->count();
        $locations = DB::table('locations')->where('location_id','=',$request->location_id)->get();
      return view('editLocation',compact('locations','count_stuff','count_admin','count_security','count_inspection'));
    }
    public function editLocationStore(request $request)
    {
        $location = Location::find($request->location_id);
        $location->longtitude = $request->get('longtitude');
        $location->latitude = $request->get('latitude');
        $location->location_name = $request->get('location_name');
        $location->location_search = $request->get('location_search');
        
        $location->save();
      return redirect('location')->withStatus(__('location successfully updated'));
    }
     public function destroyMap(request $request)
    {
        $location = Location::find($request->location_id);
        $location->delete();
        return back()->withStatus(__('location successfully delete.'));
    }
}
