<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function testing(Request $request){
    	return $request->all();
    }
}
