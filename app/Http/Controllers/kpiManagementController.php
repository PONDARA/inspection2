<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\kpi;
use Illuminate\Support\Facades\Log;
use App\Model\Question;
use App\Model\Question_categorie;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\User_type;

class KpiManagementController extends Controller
{
    public function getQuestionForm(){
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
       $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->count();
        $questionWithCategory = [];

        $questionCategories = Question_categorie::all();
        foreach($questionCategories as $cat){
            $questions = Question::where("question_cate_id", $cat->id)->get();
            $questions["cate_title"] = $cat->name;
            $questionWithCategory[$cat->name] = $questions;
        }

        // dd($questionWithCategory);

        $data = [
            'count_admin' => $count_admin,
            'count_stuff' => $count_stuff,
            'count_security' => $count_security,
            'count_inspection' => $count_inspection,
            'questionsWithCate' =>$questionWithCategory
        ];
        return view('kpi.kpiQuestion', $data,compact('count_admin','count_security','count_stuff','count_inspection','questionCategories'));
    }

    public function questionStore(Request $request){
        Log::info($request->header('Accept'));
        $request->validate([
        'question'=> 'required',
        'question_cat_id'=>'required',
      ]);
        $question = new Question([
        'question' => $request->get('question'),
        'objective'=> $request->get('objective'),
        ]);
        $question->question_cate_id = $request->get('question_cat_id');
        $question->save();

        if($request->header('Accept') == 'application/json'){
            return response()->json([
                'code' => 200,
                'question_id' => $question->id,
                'question_cate_id' => Question_categorie::find($question->question_cate_id)
            ]);
        }

        return back()->withStatus(__('Question successfully created.'));
    }

    public function handleQuestionForm(Request $request){
        foreach($request->questions as $q){
            Question::create([
                'question' => $q
            ]);
        }
    }

    public function getQustionCategory(){
        $questionCate = Question_categorie::all();

        return response()->json($questionCate);
    }

    public function getKpiDetail(Request $request){
        Log::info($request);
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = DB::table('user_inspects')->count();

        $allUser = User_type::all()[2]->users()->select('id','name', 'profile_img')->get();

        $kpi = Kpi::find($request->kpi_id);
        $kpiUsers = $kpi->kpiUsers()->get();

        foreach($allUser as $v){
            $v->is_answered = false;
            foreach($kpiUsers as $kpiUser){
                Log::info($kpiUser .  ' ' . $v);
                if($kpiUser->user_guard_id == $v->id){
                    $v->is_answered = true;
                    $v->inspector_name = User::find($kpiUser->user_inspector_id)->name;
                    break;
                }
            }

        }

        
        $kpiQuestions = $kpi->questions()->get();
        $title = $kpi->title;
        $dateTime = $kpi->date;
        $questionCount = count($kpiQuestions);
        $allSecurityCount = count($allUser);
        $allAnsweredSecurityCount = count($kpiUsers);

        Log::info($kpiQuestions);


        $data = [
            'count_admin' => $count_admin,
            'count_stuff' => $count_stuff,
            'count_security' => $count_security,
            'count_inspection' => $count_inspection,

            'kpi_questions' => $kpiQuestions,
            'all_security' => $allUser,
            'kpi_id' => $kpi->id,
            'kpi_is_active' => $kpi->publish,
            'title' => $title,
            'date_time' => $dateTime, 
            'question_count' => $questionCount,
            'all_security_count'=> $allSecurityCount,
            'all_answered_security_count' => $allAnsweredSecurityCount
            
        ];
        return view('kpi.kpiDetail', $data);
    }

    public function getKpiCreationForm(){
        $kpiActivate = Kpi::where('publish', true)->first();
        if($kpiActivate != null){
            return redirect()->back()->with('error', ['You cannot create a new KPI unless all KPI are deactivated!!']);   
        }

        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = DB::table('user_inspects')->count();

        $questionWithCategory = [];

        $questionCategories = Question_categorie::all();
        foreach($questionCategories as $cat){
            $questions = Question::where("question_cate_id", $cat->id)->get();
            $questions["cate_title"] = $cat->name;
            $questionWithCategory[$cat->name] = $questions;
        }

        // dd($questionWithCategory);

        $data = [
            'count_admin' => $count_admin,
            'count_stuff' => $count_stuff,
            'count_security' => $count_security,
            'count_inspection' => $count_inspection,
            'questionsWithCate' =>$questionWithCategory
        ];

        return view('kpi.kpiCreationForm', $data);
    }

    public function deactivateKPI(Request $request){
        $kpi = Kpi::find($request->kpi_id);

        Log::info($request['kpi_id']);
        if($kpi == null){
            return response()->json(['code'=>422]);
        }
        
        $allSecurityCount = count(User_type::all()[2]->users()->get());
        $anwswerdSecurityCount = count($kpi->kpiUsers()->get());

        if($anwswerdSecurityCount < $allSecurityCount){
            return \response()->json(['code'=> 422, 'msg' => 'Cannot deactivate, because all guards are not yet complete the KPI']);
        }

        $kpi->publish = false;
        $kpi->save();
        return response()->json(['code'=>200]);
    }

    public function createKPI(Request $request){
        Log::info($request);
        $request->validate([
            'title'=>'required',
            'all_questions'=>'required',
        ]);

        $kpi = Kpi::create([
            'title' => $request->title,
            'date' => date('Y-m-d h:m:s'),
            'publish' => true,
            'user_admin_id' => Auth::user()->id
        ]);

        foreach($request->all_questions as $q){
            $kpi->questions()->attach($q['id'],['max_score'=> $q['max_score']]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }

    public function show()
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();

        $count_inspection = DB::table('user_inspects')->count();
        $kpis = Kpi::orderBy('date', 'desc')->get();
        foreach($kpis as $kpi){
            $kpi['length'] = count($kpi->questions()->get());
        }

        $data = [
            'count_admin' => $count_admin,
            'count_stuff' => $count_stuff,
            'count_security' => $count_security,
            'count_inspection' => $count_inspection,
            'kpis' => $kpis
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
