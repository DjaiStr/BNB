<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController
{
    public function index()
    {
        // Retrieve all reviews from the database
        $reviews = Review::all();

        // Pass the reviews data to the 'index' view
        return view('index', compact('reviews'));
    }
}
