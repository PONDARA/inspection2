<?php

namespace App\Http\Controllers;

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
        $inspection = user_inspect::all();
        return view('inspection.inspectionIndex',compact('inspection'));
    }
     public function showItem()
    {
        return view('inspection.inspectionItem');
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
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/' . $filename[$i] ) );
              }  
              for($j=1;$j<count($pawnfiles);$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==2){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/' . $filename[$i] ) );
              }  
              for($j=2;$j<count($pawnfiles);$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==3){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/' . $filename[$i] ) );
              }  
              for($j=3;$j<count($pawnfiles);$j++){
                 array_push($filename[$j],"null");
              }
            }
            elseif(count($pawnfiles)==4){
              for ($i=0;$i<count($pawnfiles);$i++) {
                $filename[$i] = time()+$i . '.' . $pawnfiles[$i]->getClientOriginalExtension();
                Image::make($pawnfiles[$i])->resize(600, 600)->save( public_path('/storage/' . $filename[$i] ) );
              }  
              for($j=4;$j<count($pawnfiles);$j++){
                 array_push($filename[$j],"null");
              }
            }
        }
        else{
            $filename=['null','null','null'];
        }
      $inspection = new User_inspect([
        'inspector_id' => $request->get('inspector_id'),
        'guard_id'=> $request->get('gurard_id'),
        'comment'=> $request->get('comment'),
        'photo1'=>$filename[0],
        'photo2'=>$filename[1], 
        'photo3'=>$filename[2],
        'photo4'=>$filename[3],
        'photo5'=>$filename[4],
      ]);
      return response()->json($request->all());
    }

      public function destroy($id)
    {
        $inspection = user_inspect::find($id);
        $inspection->delete();
        return redirect('/inspectionIndex')->with('success','inspection record has been deleted successfully');
    }

}
