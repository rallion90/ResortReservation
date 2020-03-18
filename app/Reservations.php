<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['room_id', 'email', 'firstname', 'lastname', 'date_start', 'date_end'];

    public $timestamps = false;

    public function fetch_information(){
    	//return $this->belongsTo('App\UserModel', 'emp_code', 'created_at');

    	return $this->hasOne('App\Rooms', 'room_id', 'room_id');
    }

    public function fetch_information2(){
    	//return $this->belongsTo('App\UserModel', 'emp_code', 'created_at');

    	return $this->hasOne('App\Rooms', 'room_id', 'room_id');
    }
}
