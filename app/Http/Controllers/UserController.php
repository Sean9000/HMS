<?php

namespace App\Http\Controllers;


use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\User;
// use DB;
use Illumniate\Support\Facades\DB;
class UserController extends Controller
{
    public function showGuestList()
    {
        $users = User::where('role','Guest')->get();

        // $users = User::where('users','=', 'Guest');
        // $users = DB::table('users')->where('role','Guest');

        // // return view('guestList', compact('users'));
        // //  return view('guestList')-> ['users' => $users]);
        return view('guestList')->with('users', $users);
        
    }
    public function showfrontList()
    {
        $users = User::where('role','frontdesk')->get();

        // $users = User::where('users','=', 'Guest');
        
        // $users = DB::table('users')->where('role','Guest');

        // // return view('guestList', compact('users'));
        // //  return view('guestList')-> ['users' => $users]);
        return view('guestList')->with('users', $users);
        
    }
    public function showRoom()
    {
        $rooms = Room::all();
        
        // // return view('guestList', compact('users'));
        // //  return view('guestList')-> ['users' => $users]);
        return view('manage_room')->with('rooms', $rooms);
   
    }

}
