<?php

use App\Http\Controllers\Invoice_Controller;
use App\Http\Controllers\G_Info_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Guest_Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing_Page');
});

//--------------------Admin Controller

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/guestList', function () {
    return view('guestList');
});

Route::get('/booking', function () {
    return view('booking');
});
Route::get('/report', function () {
    return view('report');
});
Route::get('/c_dashboard', function () {
    return view('c_dashboard');
});
Route::get('/manage_room', function () {
    return view('manage_room');
});

Route::get('/dashboard', function () {
    return view('guest_users.')->name('calendar_dashboard');
});

Route::get('/redirects', [HomeController::class, 'index']);

    //----------------------------Guest Routes-----------------------------//

    Route::post('/guest_users/room_types', [Guest_Controller::class, 'passCheckInDate'])->name('store_date');
   
    Route::get('/guest_users/room_types', [Guest_Controller::class, 'viewRoomTypes'])->name('room_types');
    
    Route::post('/guest_users/room_info1', [Guest_Controller::class, 'type_to_info'])->name('show_room_info1');
    Route::post('/guest_users/room_info2', [Guest_Controller::class, 'type_to_info'])->name('show_room_info2');

    Route::get('/guest_users/room_info', [Guest_Controller::class, 'viewRoomInfo1'])->name('guest_reg');

    Route::get('/guest_users/room_info', [Guest_Controller::class, 'viewRoomInfo2'])->name('guest_reg');

    Route::post('/guest_users/guest_registration', [Guest_Controller::class, 'save_Registration'])->name('save_registration');

    Route::get('/guest_users/guest_registration', [Guest_Controller::class, 'view_guest_info'])->name('registration_form');

    Route::post('/guest_users/guest_information', [G_Info_Controller::class, 'save_G_Info'])->name('store_guest_info');

    // Route::post('/guest_users/invoice', [Guest_Information_Controller::class, 'save_G_Info'])->name('store_guest_info');


    Route::get('/guest_users/invoice', [Invoice_Controller::class, 'view_invoice'])->name('view_invoice');
    
    Route::get('/auth', [Guest_Controller::class, 'viewLogin'])->name('login_User');

     //----------------------------Invoice-----------------------------

     Route::post('/guest_users/invoice', [Invoice_Controller::class, 'save_invoice'])->name('store_invoice');
Route::get('/auth', [Guest_Controller::class, 'viewLogin'])->name('login_User');

// --------------------------User Controller--------------------------


Route::get('guestList',[UserController::class, 'showGuestList']);
Route::get('manage_room',[UserController::class, 'showRoom']);
Route::get('frontdesk',[UserController::class, 'showfrontList']);

Route::get('manage_room',[UserController::class, 'showRoom']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('test', function(){
    return "test";
});
 require __DIR__.'/auth.php';
