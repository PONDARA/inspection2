<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\kpi;

class kpiManagementController extends Controller
{
     public function show()
    {
        // $inspection = user_inspect::all();
        return view('kpi.kpiManagement');
    }
      public function destroy($id)
    {
        $kpi = kpi::find($id);
        $kpi->delete();
        return redirect('/inspectionIndex')->with('success','inspection record has been deleted successfully');
    }
}
