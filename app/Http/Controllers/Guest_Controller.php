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
      
        $validatedData = $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            // 'room_id' => 'required|exists:rooms,id',
        ], [
            'check_in_date.required' => 'The check-in date is required.',
            'check_out_date.required' => 'The check-out date is required.',
            'check_out_date.after' => 'The check-out date must be after the check-in date.',
        ]);
        $roomIds = Rooms::pluck('id');
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');    
        $numberOfNights = $request->input('number_of_nights');

        $request->session()->put('check_in_date', $checkInDate);
        $request->session()->put('check_out_date', $checkOutDate);
        $request->session()->put('number_of_nights', $numberOfNights);

        $roomIds = Rooms::pluck('id');
        $reservedRoomIds = Reservation::where(function($query) use ($checkInDate, $checkOutDate) {
            $query->whereBetween('checkin_date', [$checkInDate, $checkOutDate])
                  ->orWhereBetween('checkout_date', [$checkInDate, $checkOutDate]);
        })->pluck('room_id')->toArray();
        
        if (count(array_diff($roomIds->toArray(), $reservedRoomIds)) == 0) {
            return back()->withErrors(['message' => 'No available room(s) from the selected dates due to its occupancy. You may try to select another date'])->withInput();
        }
        
        return redirect()->route('room_types');
    
        // return redirect()->route('room_types');  
    }
    
    public function viewRoomTypes() {

    
        $room1 = Rooms::where('id', 1)->first();
        $room2 = Rooms::where('id', 2)->first();
        
        $checkInDate = session('check_in_date');
        $checkOutDate = session('check_out_date');
        
        $isRoom1Reserved = $this->isRoomReserved($room1->id, $checkInDate, $checkOutDate);
        $isRoom2Reserved = $this->isRoomReserved($room2->id, $checkInDate, $checkOutDate);
    
        return view('guest_users.room_types',[
            'room1'=>$room1, 
            'room2'=>$room2,
            'isRoom1Reserved'=>$isRoom1Reserved,
            'isRoom2Reserved'=>$isRoom2Reserved
        ]);
    }
    public function isRoomReserved($roomTypeId, $checkInDate, $checkOutDate)
    {
        $reservations = Reservation::where('room_id', $roomTypeId)
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('checkin_date', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('checkout_date', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('checkin_date', '<=', $checkInDate)
                            ->where('checkout_date', '>=', $checkOutDate);
                    });
            })->get();

        return count($reservations) > 0;
    }
    

    public function type_to_info($room_id)
    {
        $rooms = Rooms::where('id', $room_id)->first();
        $checkin_date = session('check_in_date');
        $checkout_date = session('check_out_date');
        $number_of_nights = session('number_of_nights');

        return view('guest_users.room_info',
         ['check_in_date' => $checkin_date,
          'check_out_date' => $checkout_date,
          'number_of_nights' => $number_of_nights,
          'rooms'=>$rooms,
        ]);
    }

    public function save_Registration(Request $request) {
        $guest_id  = auth()->user()->id;

        $numNights = $request->input('number_of_nights');
        $room_id = $request->input('room_id');
        $numGuests = $request->input('guest_num');
        $extraBed = $request->input('extra_bed');
        $booking_status = 'pending';
        $roomPrice = Rooms::where('id', $room_id)->value('rate');
        $add_extra_bed = 300;
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

        if ($room_id == 1 || $room_id == 2) {
            Rooms::where('id', $room_id)->update(['status_update' => 'Not Available']);
        }

        $request->session()->put('resevation', [
            'checkin_date' => $request->input('checkin_date'),
            'checkout_date' => $request->input('checkout_date'),
            'number_of_nights' => $request->input('number_of_nights')
        ]);
        $request->session()->forget('resevation');

        return redirect()->route('registration_form');
    } 

    public function view_guest_info(){

        return view('guest_users.guest_registration');
    }

       public function viewLogin() {

        return view('auth.login');
    }
}
