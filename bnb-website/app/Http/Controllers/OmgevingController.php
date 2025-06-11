<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class OmgevingController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('omgeving', compact('activities'));
    }
}
