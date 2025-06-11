<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        // Retrieve all rooms from the database
        $rooms = Room::all();

        // Pass the rooms data to the view
        return view('kamers', compact('rooms'));
    }

    public function show($id)
{
    // Haal de kamer op of geef een foutmelding als deze niet gevonden is
    $room = Room::findOrFail($id);

    // Voeg tijdelijk een array van extra afbeeldingen toe voor testen
    $room->additional_pictures = [
        'https://via.placeholder.com/800x400?text=Room+Extra+1',
        'https://via.placeholder.com/800x400?text=Room+Extra+2',
        'https://via.placeholder.com/800x400?text=Room+Extra+3'
    ];

    // Verwijs naar de juiste view
    return view('rooms.show', compact('room'));
}

    }

