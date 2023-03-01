<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\GuestInformation;

class Invoice_Controller extends Controller
{
    public function view_invoice() {

        $reservation = Reservation::where('guest_id', auth()->user()->id)->latest()->first();
        $guestRegistration = GuestInformation::where('guest_id', auth()->user()->id)->latest()->first();

        // Pass the reservation data to the invoice view
        return view('guest_users.invoice', [
            'reservation' => $reservation,
            'guestRegistration' => $guestRegistration,
        ]);
    }

      
    public function __construct()
    {
                $this->middleware('auth');
    }
    
    // public function create_invoice(){
        
    // }
    
}
