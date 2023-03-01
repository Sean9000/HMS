<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\GuestInformation;


class G_Info_Controller extends Controller
{
 
    public function save_G_Info(Request $request)
    {
        $guest_id = auth()->user()->id;
        // $reservation_id = auth()->user()->id;
        $reservation_id = Reservation::select('id')->latest('id')->value('id');

        // Validate the request data
    
        $salutation = $request->input('salutation');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $company_name = $request->input('company_name');
        $address = $request->input('address');
        $phone_number = $request->input('phone_number');
        $payment_method = $request->input('payment_method');
        $department_id = $request->input('department');

       
        $guestInformation = new GuestInformation();
        $guestInformation->guest_id = $guest_id;
        $guestInformation->reservation_id = $reservation_id;
        $guestInformation->salutation = $salutation;
        $guestInformation->first_name = $first_name;
        $guestInformation->last_name = $last_name;  
        $guestInformation->company_name = $company_name;
        $guestInformation->address = $address;
        $guestInformation->phone_number = $phone_number;

        if($payment_method == "Cash"){
            $guestInformation->payment_method = $payment_method;
        }else if($payment_method == "Department Charge"){
            $guestInformation->payment_method = $payment_method;
        }

        if($department_id == "School of Information Technology"){
            $guestInformation->department = $department_id;
        }else if($department_id == "School of Education"){
            $guestInformation->department = $department_id;
        }
        else if($department_id == "School of Business and Hospitality and Tourism Management"){
            $guestInformation->department = $department_id;
        }
        else if($department_id == "School of Engineering and Architechture and Fine Arts"){
            $guestInformation->department = $department_id;
        }
        else if($department_id == "School of Liberal Arts and Criminal Justice"){
            $guestInformation->department = $department_id;
        }

        // Save the model instance to the database
        $guestInformation->save();

        // Redirect to a success page
        return redirect()->route('view_invoice');
        
    }

    public function view_guest_info() {

        return view('guest_users.guest_registration');
    }

   

}
