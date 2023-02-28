<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\calendar;
use App\Models\Calendars;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
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
        return redirect()->route('room_types');

        // return view('guest_users.room_types');
    }

        public function viewRoomTypes() {

            return view('guest_users.room_types');
        }

    public function type_to_info(Request $request)
    {
        $request->session()->put('check_in_date', $request->input('check_in_date'));
        $request->session()->put('check_out_date', $request->input('check_out_date'));

        return redirect()->route('guest_reg');
        // return view('guest_users.room_info');

    }
    // public function viewRoomInfo() {

    //     return view('guest_users.room_info');
    // }

    public function viewRoomInfo(Request $request)
    {
        $checkin_date = $request->session()->get('check_in_date');
        $checkout_date = $request->session()->get('check_out_date');
        return view('guest_users.room_info', ['check_in_date' => $checkin_date, 'check_out_date' => $checkout_date]);
        
    }
    // public function showRoomDate(){

    // //     // $rooms = DB::table('rooms')
    // //     // ->select('capacity', 'room_type', 'rate')
    // //     // ->where('room_no', '=', 1)
    // //     // ->first();

    // //     // $rooms = Calendars::select('checkin_date', 'checkout_date', 'room_id')
    // //     // ->with('room')
    // //     // ->where('user_id', Auth::Id())
    // //     // ->get();

    // //     $rooms = DB::table('calendars')
    // //     ->join('rooms', 'calendars.room_id', '=', 'rooms.room_no')
    // //     ->select('calendars.checkin_date', 'calendars.checkout_date', 'rooms.room_type', 'rooms.capacity', 'rooms.rate')
    // //     ->where('calendars.user_id', '=', Auth::id())
    // //     ->first();
        
    //     // return view('guest_users.room_info', ['rooms' => $rooms]);
      
    // }

    public function Show_Regitration(Request $request) {

        $user_id = auth()->user()->id;
        $room_id = auth()->user()->id;

        $checkIn = $request->input('check_in_date');
        $checkOut = $request->input('check_out_date');

        $checkIn = date('y-m-d', strtotime($checkIn));
        $checkOut = date('y-m-d', strtotime($checkOut));

        $room_save = new Room();
        $room_save->timestamps = false;
        $room_save->user_id = $user_id;
        $room_save->user_id = $room_id;
        $room_save->extra_person = $request->input('quantity');
        $room_save->extra_bed = $request->input('quantity');
        $room_save->save();

        $save_data = new Calendars();
        $save_data->user_id = $user_id;
        $save_data->checkin_date = $checkIn;
        $save_data->checkout_date = $checkOut; 
        $save_data->save();

        return view('guest_users.guest_registration');
    } 
 

    public function viewLogin() {

        return view('auth.login');
    }

    public function backRoomTypes() {

        return view('guest_users.room_types');
    }
 
}
