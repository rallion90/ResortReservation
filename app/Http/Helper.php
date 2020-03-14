<?php
namespace App\Http;

use App\Rooms;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

class Helper{

	public static function get_rooms(){
		$rooms = new Rooms;

		$get_rooms = $rooms::where('tag_deleted', '=', 0)->get();

		return $get_rooms;
	}

}
