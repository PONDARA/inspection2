<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inspectionItemController extends Controller
{
	 public function show()
    {
        return view('inspection.inspectionItem');
    }
}
