<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['room_id', 'email', 'firstname', 'lastname', 'date_start', 'date_end'];

    public $timestamps = false;
}
