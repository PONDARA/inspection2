<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User_inspect;
use App\User;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;
class InspectionController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showIndex(Request $request)
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->count();
        if($request->dateSearch == null){
          $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->paginate(10);
        }
        else{
           $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',$request->dateSearch)->select('user_inspects.*','users.name')->paginate(10);
        }
        $inspectors = DB::table('user_inspects')->join('users','users.id','=','user_inspects.inspector_id')->select('user_inspects.*','users.name')->get();
        $countarray=count($guards);
        return view('inspection.inspectionIndex',compact('count_admin','count_security','count_stuff','count_inspection','guards','inspectors','countarray'));
    }
     public function showItem(Request $request)
    {
        $inspections = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where('user_inspect_id','=',$request->inspectionId)->select('user_inspects.*','name')->get();
        $inspectorNames = DB::table('user_inspects')->join('users','users.id','=','user_inspects.inspector_id')->where('user_inspect_id','=',$request->inspectionId)->select('user_inspects.*','name')->get();
        // dd($inspection);
        return view('inspection.inspectionItem',compact('inspections','inspectorNames'));
    }
     public function storee(Request $request)
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
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspection/' . $filename[$i] ) );
              }  
              for($j=1;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==2){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspection/' . $filename[$i] ) );
              }  
              for($j=2;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==3){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspection/' . $filename[$i] ) );
              }  
              for($j=3;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==4){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspection/' . $filename[$i] ) );
              }  
              for($j=4;$j<5;$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==5){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/inspection/' . $filename[$i] ) );
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
        'photo1'=>$filename[0],
        'photo2'=>$filename[1], 
        'photo3'=>$filename[2],
        'photo4'=>$filename[3],
        'photo5'=>$filename[4],
      ]);
      $inspection->save();
      return response()->json($request->all());
    }

    public function securityView(Request $request)
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
       $count_inspection = $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where(DB::raw('substr(user_inspects.created_at,1,10)'),'=',date("Y-m-d"))->select('user_inspects.*','users.name')->count();
        $guards = DB::table('user_inspects')->join('users','users.id','=','user_inspects.guard_id')->where('user_inspects.guard_id','=',$request->security_id)->select('user_inspects.*','users.name','users.profile_img')->paginate(10);
        // dd($guards->all());
        $guardHeader = User::where('users.id','=',$request->security_id)->get();
        $inspectors = DB::table('user_inspects')->join('users','users.id','=','user_inspects.inspector_id')->where('user_inspects.guard_id','=',$request->security_id)->select('user_inspects.*','users.name')->get();
        $countarray=count($guards);
        return view('users.securityView',compact('count_admin','count_security','count_stuff','count_inspection','guards','inspectors','countarray','guardHeader'));
    }

      public function destroy(Request $request)
    {
        $inspection = user_inspect::find($request->id);
        $photo1=$inspection->photo1;
        $photo2=$inspection->photo2;
        $photo3=$inspection->photo3;
        $photo4=$inspection->photo4;
        $photo5=$inspection->photo5;
        $inspection->delete();
        $inspectionPhoto=array($photo1,$photo2,$photo3,$photo4,$photo5);
        for($i=0;$i<5;$i++){
          $profile_imgs_del[$i]='public/inspection/' . $inspectionPhoto[$i];
            if(Storage::disk('local')->exists($profile_imgs_del[$i])){
                    Storage::disk('local')->delete($profile_imgs_del[$i]);
            }
          }
        return back()->withStatus(__('inspection successfully delete.'));
  }
}
