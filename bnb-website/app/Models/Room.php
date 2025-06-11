<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Room extends Model
{
    protected $fillable = ['room_type_id', 'room_number'];

    // A room belongs to a room type
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    // A room has many availabilities
    public function availabilities()
    {
        return $this->hasMany(RoomAvailability::class);
    }
}
