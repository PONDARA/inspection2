<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\user_inspect;
use App\User;
class inspectionIndexController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function show()
    {
        $inspection = user_inspect::all();
        return view('inspection.inspectionIndex',compact('inspection'));
    }

     public function store()
    {
        $request->validate([
        'share_name'=>'required',
        'share_price'=> 'required|integer',
        'share_qty' => 'required|integer'
      ]);
      $share = new Share([
        'share_name' => $request->get('share_name'),
        'share_price'=> $request->get('share_price'),
        'share_qty'=> $request->get('share_qty')
      ]);
      $share->save();
      return redirect('/shares')->with('success', 'Stock has been added');
    }

      public function destroy($id)
    {
        $inspection = user_inspect::find($id);
        $inspection->delete();
        return redirect('/inspectionIndex')->with('success','inspection record has been deleted successfully');
    }
}
