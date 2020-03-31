<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'reservation_id';

    protected $fillable = ['room_id', 'room_name', 'email', 'firstname', 'lastname', 'date_start', 'date_end', 'invoice_number', 'payment_id'];

    public $timestamps = false;

    public function fetch_information(){
    	//return $this->belongsTo('App\UserModel', 'emp_code', 'created_at');

    	return $this->hasOne('App\Rooms', 'room_id', 'room_id');
    }

    

}
