<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\kpi;
use Illuminate\Support\Facades\Log;
use App\Model\Question;
use App\Model\Question_categorie;

class KpiManagementController extends Controller
{
    public function getQuestionForm(){
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->count();
        $question_categories = Question_categorie::all();
        return view('kpi.kpiQuestion', compact('count_admin','count_security','count_stuff','count_inspection','question_categories'));
    }
    public function questionStore(Request $request){
         $request->validate([
        'question'=>'required',
        'question_cat_id'=>'required',
      ]);
        $question = new Question([
        'question' => $request->get('question'),
        'objective'=> $request->get('objective'),
        ]);
        $question->question_cat_id=$request->get('question_cat_id');
        $question->save();
        return view('kpi.kpiQuestion')->withStatus(__('Question successfully created.'));
    }

    public function handleQuestionForm(Request $request){
        foreach($request->questions as $q){
            Question::create([
                'question' => $q
            ]);
        }
    }

    public function getKpiDetail($id){
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = DB::table('user_inspects')->count();

        $data = [
            'count_admin' => $count_admin,
            'count_stuff' => $count_stuff,
            'count_security' => $count_security,
            'count_inspection' => $count_inspection,
            
        ];
        return view('kpi.kpiDetail', $data);
    }

    public function getKpiCreationForm(){
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = DB::table('user_inspects')->count();

        $data = [
            'count_admin' => $count_admin,
            'count_stuff' => $count_stuff,
            'count_security' => $count_security,
            'count_inspection' => $count_inspection,
            
        ];
        return view('kpi.kpiCreationForm', $data);
    }

    public function show()
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();

        $count_inspection = DB::table('user_inspects')->count();

        $data = [
            'count_admin' => $count_admin,
            'count_stuff' => $count_stuff,
            'count_security' => $count_security,
            'count_inspection' => $count_inspection,
            
        ];

        return view('kpi.kpiManagement', $data);
    }

    public function destroy($id)
    {
        $kpi = kpi::find($id);
        $kpi->delete();
        return redirect('/inspectionIndex')->with('success','inspection record has been deleted successfully');
    }
}
