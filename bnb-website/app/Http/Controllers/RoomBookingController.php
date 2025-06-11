<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room; // Assuming you have a Room model
use App\Models\Booking; // Assuming you have a Booking model

class RoomBookingController extends Controller
{

    // Display the booking form
    public function showBookingForm($id)
    {
        $room = Room::findOrFail($id); // Get the room details
        return view('book-room', compact('room'));
    }

    // Process the booking submission
    public function processBooking(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        
        try {
            // Validatie uitvoeren
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'adres' => 'nullable|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
               // 'extra_services' => 'nullable|array',
               
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validatiefouten bekijken
            dd($e->errors());
        }

        // Save the booking to the database
        $booking = new Booking();
        $booking->room_id = $room->id;
        $booking->user_id = NULL;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->adres = $request->adres;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        
        //$booking->extra_services = json_encode($request->extra_services);
        
        $booking->save();

        return redirect()->back()->with('success', 'Room booked successfully!');
    }
}
