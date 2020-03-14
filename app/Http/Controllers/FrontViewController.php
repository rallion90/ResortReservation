<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontViewController extends Controller
{
    //
    public function index(){
    	return view('index');
    }

    public function rooms(){
    	return view('rooms');
    }
}
