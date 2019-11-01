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

class MobileController extends Controller
{
    public function login(Request $request)
    {
       if (auth()->attempt(['email' => $request->email, 'password' => $request->password,'user_type_id'=>2])){ 
            $user = Auth::user();
            $token = $user->createToken('Myapp')->accessToken;
            return [
                'msg'=>true, 
                'user_id'=>Auth::id(),
                'token'=>$token];
        } else {
            return response()->json(['token'=>'no access token','msg'=>'Incorrect email or password'], 401);
        } 
    }
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
}
