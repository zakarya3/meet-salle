<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ["date", "duration", "client_name", "client_email", "client_phone", "status", "room_id"];

    public function rooms()
    {
        return $this->belongsTo(Room::class, "room_id", 'id');
    }
}
