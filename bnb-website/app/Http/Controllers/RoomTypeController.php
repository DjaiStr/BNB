<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RoomType;


class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('kamers', compact('roomTypes')); // Change 'roomtypes.index' to 'kamers'`
    }


    public function show($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('rooms.show', compact('roomType')); // Update view path to 'rooms.show'
    }


    public function book(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);

        // Retrieve dates from query parameters
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        return view('rooms.book', compact('roomType', 'startDate', 'endDate'));
    }



    public function processBooking(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Save booking details (this is just an example)
        // Booking::create([
        //     'room_type_id' => $roomType->id,
        //     'user_id' => auth()->id(),
        //     'start_date' => $request->input('start_date'),
        //     'end_date' => $request->input('end_date'),
        // ]);

        return redirect()->route('kamers')->with('success', 'Booking Confirmed Successfully!');
    }
}
