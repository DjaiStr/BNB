<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Optional: Specify the table name if it doesn't follow Laravel's naming convention
    // protected $table = 'reviews';

    // Optional: If the table doesn't have timestamps (created_at and updated_at columns), you can disable it
    // public $timestamps = false;

    // Specify which fields are mass-assignable
    protected $fillable = ['user_id', 'review', 'rating', 'created_at', 'updated_at', 'name'];
}
