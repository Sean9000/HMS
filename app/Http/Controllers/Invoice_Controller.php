<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Reservation;
use App\Models\GuestInformation;

class Invoice_Controller extends Controller
{
    public function view_invoice() {

        $reservation = Reservation::where('guest_id', auth()->user()->id)->latest()->first();
        $guestRegistration = GuestInformation::where('guest_id', auth()->user()->id)->latest()->first();
        // $rooms = Rooms::where('guest_id', auth()->user()->id)->latest()->first();
        $rooms = Rooms::where('id', function ($query) {
            $query->select('room_id')
                  ->from('reservations')
                  ->where('guest_id', auth()->user()->id)
                  ->latest()
                  ->first();
        })->first();
        
        // if ($rooms) {
        //     $roomType = $rooms->room_type;
        //     // use $roomType variable to display the room type
        // } else {
        //     // handle the case when the room is not found
        // }
        
        // Pass the reservation data to the invoice view
        return view('guest_users.invoice', [
            'reservation' => $reservation,
            'guestRegistration' => $guestRegistration,
            'rooms' => $rooms,
        ]);
    }

      
    public function __construct()
    {
                $this->middleware('auth');
    }
    
    // public function create_invoice(){
        
    // }
    
}
