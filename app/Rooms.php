<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //
	protected $primaryKey = 'room_id';

    protected $table = 'rooms';

    public $timestamps = false;

    protected $fillable = ['room_id', 'room_name', 'room_description', 'room_price'];

    

     


}
