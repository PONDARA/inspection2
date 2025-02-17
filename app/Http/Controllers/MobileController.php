<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Gallery;
use App\Models\Vendors;
use Auth;
use App\User;
use Illuminate\Support\Facades\Input;
use Hash;
use Image;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\DB;
use App\Model\User_inspect;
use App\Model\KpiUser;
use App\Model\kpi;

class MobileController extends Controller
{
    public function login(Request $request)
    {
       if (auth()->attempt(['email' => $request->email, 'password' => $request->password,'user_type_id'=>2])){ 
            $user = Auth::user();
            $token = $user->createToken('Myapp')->accessToken;
            return [
                'msg'=>"inspector", 
                'user_id'=>Auth::id(),
                'token'=>$token];
        } 
        elseif (auth()->attempt(['email' => $request->email, 'password' => $request->password,'user_type_id'=>1])){ 
            $user = Auth::user();
            $token = $user->createToken('Myapp')->accessToken;
            return [
                'msg'=>"inspector", 
                'user_id'=>Auth::id(),
                'token'=>$token];
        }
        else {
            return response()->json(['token'=>'no access token','msg'=>'Incorrect email or password'], 401);
        } 
    }
    // public function inspectionLoadGuard(Request $request)
    // {
      
    // }
    public function inspectionList(Request $request)
    {
      // dd($request->all());
       $inspectionList = User_inspect::where('inspector_id','=',$request->inspector_id)->get();
       dd($inspectionList);
       return [
                'msg'=>true, 
                'token'=>$inspectionList];
    }
    public function storeInspection(Request $request)
    {
      //   $request->validate([
      //   'share_name'=>'required',
      //   'share_price'=> 'required|integer',
      //   'share_qty' => 'required|integer'
      // ]);
      if($request->hasFile('inspectionPhoto')){
            $pawnfiles = $request->file('inspectionPhoto');
            if(count($pawnfiles)==1){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspections/' . $filename[$i] ) );
              }  
              for($j=1;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==2){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspections/' . $filename[$i] ) );
              }  
              for($j=2;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==3){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspections/' . $filename[$i] ) );
              }  
              for($j=3;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==4){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspections/' . $filename[$i] ) );
              }  
              for($j=4;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==5){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspections/' . $filename[$i] ) );
              }  
            }
        }
        else{
            $filename=['null','null','null','null','null'];
        }
      $inspection = new User_inspect([
        'inspector_id' => $request->get('inspector_id'),
        'guard_id'=> $request->get('guard_id'),
        'comment'=> $request->get('comment'),
        'status'=> $request->get('status'),
        'latitude'=> $request->get('latitude'),
        'longtitude'=> $request->get('longtitude'),
        'photo1'=>$filename[0],
        'photo2'=>$filename[1], 
        'photo3'=>$filename[2],
        'photo4'=>$filename[3],
        'photo5'=>$filename[4],
      ]);
      $inspection->save();
      return response()->json("success");
    }
     public function KPIstore(Request $request)
    {
       $kpi_user = new KpiUser([
        'total_score' => $request->get('total_score'),
        'creted_at'=> now(),
        'kpi_id'=>$request->get('kpi_id'),
        'user_guard_id'=> $request->get('user_guard_id'),
        'user_inspector_id'=> $request->get('user_inspector_id'),
      ]);
      $kpi_user->save();
      return response()->json("success");
    }
    // load active kpi function###########################
    public function kpiList(Request $request)
    {
      $kpiList= DB::table('kpi_question')
      ->join('kpis', 'kpis.id', '=', 'kpi_question.kpi_id')->join('questions', 'kpi_question.question_id', '=', 'questions.id')
      ->where('kpis.publish','=',1)
      ->get(['max_score','kpis.id','kpis.title','question_id','question']);
   return response(array('kpiLists'=>$kpiList));
   
    }
    // load active guard function###########################
    public function guardList(Request $request)
    {
      $guardDones = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('users.id')->get()->toArray();
      foreach($guardDones as $guardDone ){
          $array[] = $guardDone->id;
        }
      if(count($guardDones)>0){
        $guardLists[] = DB::table('users')->whereNotIn('users.id',$array)->where('users.user_type_id','=',3)->get();
      }
      else{
        $guardLists = DB::table('users')->where('users.user_type_id','=',3)->get();
      }
      return response(array('guardLists'=>$guardLists));
    }
}
