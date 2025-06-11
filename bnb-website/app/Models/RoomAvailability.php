<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomAvailability extends Model
{
    protected $fillable = ['room_id', 'date', 'is_available'];

    // A room availability belongs to a room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
