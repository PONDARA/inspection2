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

class MobileController extends Controller
{
    public function login(Request $request)
    {
       if (auth()->attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user();
            $token =  $user->createToken('MyApp')-> accessToken;
            $shop = Vendors::where('user_id',Auth::id())->select('*')->first();
            return [
                'msg'=>true, 
                'user_id'=>Auth::id(),
                'shop_id' => $shop->id,
                'token'=>$token];
        } else {
            return response()->json(['token'=>'no access token','msg'=>'Incorrect email or password'], 401);
        } 
    }
}
