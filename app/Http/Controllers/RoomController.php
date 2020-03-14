<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rooms;

class RoomController extends Controller
{
    public function fetch_room(){
    	$room = new Rooms;

    	$get_rooms = $room::where('tag_deleted', '=', 0)->get();

    	//var_dump($get_rooms);

    	return view('rooms', compact('get_rooms'));
    }
}
