<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User_inspect;
use App\User;
use Image;
class InspectionController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showIndex()
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $count_inspection = DB::table('user_inspects')->count();
        return view('inspection.inspectionIndex',compact('count_admin','count_security','count_stuff','count_inspection'));
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

      public function destroy($id)
    {
        $inspection = user_inspect::find($id);
        $inspection->delete();
        return redirect('/inspectionIndex')->with('success','inspection record has been deleted successfully');
    }

}
