<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rooms;
use App\Models\Reservation;
use Illuminate\Http\Request;



class Guest_Controller extends Controller
{
    public function passCheckInDate(Request $request)
    {
        $request->validate([
            'check_in_date' => 'required',
            'check_out_date' => 'required',],
            ['check-in-date.required' => 'The check-in date is required.',
            'check-out-date.required' => 'The check-out date is required.',
         ]);

        $request->session()->put('check_in_date', $request->input('check_in_date'));
        $request->session()->put('check_out_date', $request->input('check_out_date'));
        $request->session()->put('number_of_nights', $request->input('number_of_nights'));
        
        return redirect()->route('room_types');

        // return view('guest_users.room_types');
    }

    public function viewRoomTypes() {

    $room1 = Rooms::where('id', 1)->first();
    $room2 = Rooms::where('id', 2)->first();
    return view('guest_users.room_types',['room1'=>$room1, 'room2'=>$room2]);
        
    }

    public function type_to_info(Request $request)
    {
    

        //   'id'=>$rooms->id,
        //   'capacity' => $rooms->capacity,
        //   'roomType' => $rooms->room_type,
        //   'rate' => $rooms->rate,
        //   'amenites' => $rooms->amenites,
        //   'description' => $rooms->description,

        $request->session()->put('check_in_date', $request->input('check_in_date'));
        $request->session()->put('check_out_date', $request->input('check_out_date'));
        $request->session()->put('number_of_nights', $request->input('number_of_nights'));

        return redirect()->route('guest_reg');
        // return view('guest_users.room_info');

    }
    // public function viewRoomInfo() {

    //     return view('guest_users.room_info');
    // }

    public function viewRoomInfo1(Request $request,)
    {
        $rooms = Rooms::select('rooms')
        ->select('id','capacity', 'room_type', 'rate','amenites','description')
        ->where('id', '=', 1)
        ->first();

        $checkin_date = $request->session()->get('check_in_date');
        $checkout_date = $request->session()->get('check_out_date');
        $number_of_nights = $request ->session()->get('number_of_nights');

        return view('guest_users.room_info',
         ['check_in_date' => $checkin_date,
          'check_out_date' => $checkout_date,
          'number_of_nights' => $number_of_nights,
          'id'=>$rooms->id,
          'capacity' => $rooms->capacity,
          'roomType' => $rooms->room_type,
          'rate' => $rooms->rate,
          'amenites' => $rooms->amenites,
          'description' => $rooms->description,
        ]);
        
    }
    public function viewRoomInfo2(Request $request,)
    {
        $rooms = Rooms::select('rooms')
        ->select('id','capacity', 'room_type', 'rate','amenites','description')
        ->where('id', '=', 2)
        ->first();

        $checkin_date = $request->session()->get('check_in_date');
        $checkout_date = $request->session()->get('check_out_date');
        $number_of_nights = $request ->session()->get('number_of_nights');

        return view('guest_users.room_info',
         ['check_in_date' => $checkin_date,
          'check_out_date' => $checkout_date,
          'number_of_nights' => $number_of_nights,
          'id'=>$rooms->id,
          'capacity' => $rooms->capacity,
          'roomType' => $rooms->room_type,
          'rate' => $rooms->rate,
          'description' => $rooms->description,
          'amenites' => $rooms->amenites,
    
        ]);
        
    }


    public function save_Registration(Request $request) {

        $guest_id  = auth()->user()->id;
    
        // $room_id = Input::get('room_id', 'default_value');
        $roomPrice = 1300;
        $add_extra_bed = 300;
        $numNights = $request->input('number_of_nights');
        $room_id = $request->input('room_id');
        $numGuests = $request->input('guest_num');
        $extraBed = $request->input('extra_bed');
        $booking_status = 'pending';

        if ($numNights > 1) {
            $total_roomPrice = $roomPrice * $numNights;
        } else {
            $total_roomPrice = $roomPrice;
        }

        if ($extraBed > 1) {
           $extraBedFee = $add_extra_bed * $extraBed;
        } else {
            $extraBedFee = 0;
        }
        $total_extraBedFee = $extraBedFee;
        $totalPrice = $total_roomPrice + $total_extraBedFee;

        $checkIn = $request->input('check_in_date');
        $checkOut = $request->input('check_out_date');

         $checkin_date = date('Y-m-d', strtotime($checkIn));
        $checkout_date = date('Y-m-d', strtotime($checkOut));

        $reservation = new Reservation();
        $reservation->guest_id = $guest_id;
        $reservation->room_id = $room_id;
        $reservation->book_status = $booking_status; 
        $reservation->night = $numNights;
        $reservation->checkin_date = $checkin_date;
        $reservation->checkout_date = $checkout_date;
        $reservation->base_price = $roomPrice;
        $reservation->total_price = $totalPrice;
        $reservation->num_guests = $numGuests;
        $reservation->extra_bed = $extraBed;
        $reservation->extra_bedFee = $extraBedFee;


        $reservation->save();

        $request->session()->put('booking', [
            'checkin_date' => $request->input('checkin_date'),
            'checkout_date' => $request->input('checkout_date'),
            'number_of_nights' => $request->input('number_of_nights')
        ]);
        $request->session()->forget('booking');


        return redirect()->route('registration_form');
    } 

    public function view_guest_info(){


        return view('guest_users.guest_registration');
    }



    public function viewLogin() {

        return view('auth.login');
    }

    // public function backRoomTypes() {

    //     return view('guest_users.room_types');
    // }
 
}
