<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
  {
    $role=Auth::user()->role;

    if($role =='Guest'){
        return view('dashboard');
    }
    if($role=='Admin'){
      $totalGuest = User::where('role','Guest')->count();
      $totalFront = User::where('role','Frontdesk')->count();

         return view('admin_dashboard',compact('totalGuest','totalFront'));
        // return view('admin_dashboard');

       
    }else{
        return view('login');
    }


  }

}

