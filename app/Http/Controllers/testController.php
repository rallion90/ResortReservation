<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function testing(Request $request){
    	$room = $request->input('room');
    	$date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');

        echo $date_start;
    }
}
