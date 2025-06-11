<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController; // ContactController toevoegen

use Illuminate\Support\Facades\Route;
 // Roomcontroller toevoegen
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\OmgevingController;
Route::get('/omgeving', [OmgevingController::class, 'index'])->name('omgeving.index');



Route::get('/', function () {
    return view('index');
});


// Route for 'kamers' index page
Route::get('/kamers', [RoomTypeController::class, 'index'])->name('kamers.index');

Route::get('/roomtypes/{id}', [RoomTypeController::class, 'show'])->name('roomtypes.show');

// Route for booking a specific room type
Route::get('/roomtypes/{id}/book', [RoomTypeController::class, 'book'])->name('book.roomtype');
// Process booking form submission
Route::post('/roomtypes/{id}/book', [RoomTypeController::class, 'processBooking'])->name('process.booking');



// Route::post('/roomtypes/{id}/book', [RoomTypeController::class, 'processBooking'])->name('process.booking');



Route::get('/index', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// pas dit niet aan tenzij nodig. dit is een route van de login & auth.
Route::get('/dashboard', function () {
    return view('index'); // dit is de redirect naar de index.blade.php 
})->name('dashboard');

// omgeving route
Route::get('/omgeving', [OmgevingController::class, 'index'])->name('omgeving');


// Contact routes
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Post route voor het versturen van contactformulier
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

require __DIR__ . '/auth.php';

use App\Http\Controllers\ReviewController;

Route::get('', [ReviewController::class, 'index'])->name('index');
Route::get('/index', [ReviewController::class, 'index'])->name('index');
Route::get('/dashboard', [ReviewController::class, 'index'])->name('dashboard');

use App\Http\Controllers\RoomBookingController;

// route van formulier submitten
Route::post('/process-booking/{roomTypeId}', [RoomBookingController::class, 'processBooking'])->name('process.booking');

