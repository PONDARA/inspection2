<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\kpi;
use Illuminate\Support\Facades\Log;
use App\Model\Question;

class KpiManagementController extends Controller
{
    public function getQuestionForm(){
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->count();


        return view('kpi.kpiQuestion', compact('count_admin','count_security','count_stuff','count_inspection'));
    }

    public function handleQuestionForm(Request $request){
        foreach($request->questions as $q){
            Question::create([
                'question' => $q
            ]);
        }
    }

    public function show()
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
       $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->count();
        return view('kpi.kpiManagement',compact('count_admin','count_security','count_stuff','count_inspection'));
    }

    public function destroy($id)
    {
        $kpi = kpi::find($id);
        $kpi->delete();
        return redirect('/inspectionIndex')->with('success','inspection record has been deleted successfully');
    }
}
