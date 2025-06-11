<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Optionally specify the table if it doesn't follow Laravel conventions
    protected $table = 'bookings';

    // Specify fillable fields for mass assignment
    protected $fillable = ['room_id', 'user_id', 'name', 'email', 'phone', 'address', 'start_date', 'end_date'];

}
