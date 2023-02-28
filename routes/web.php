<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GuestController;
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

//----------------------------Guest Routes-----------------------------
// Route::post('/guest_users', 'GuestController@save')->name('save_date');

Route::post('/guest_users/room_types', [GuestController::class, 'passCheckInDate'])->name('store_date');

Route::get('/guest_users/room_types', [GuestController::class, 'viewRoomTypes'])->name('room_types');

Route::post('/guest_users/room_info', [GuestController::class, 'type_to_info'])->name('show_room_info');

Route::get('/guest_users/room_info', [GuestController::class, 'viewRoomInfo'])->name('guest_reg');

Route::post('/guest_users/guest_registration', [GuestController::class, 'Show_Regitration'])->name('registration_form');

Route::get('/guest_users/guest_registration', [GuestController::class, 'Show_Regitration'])->name('registration_form');

// Route::post('/guest_users', [GuestController::class, 'type_to_info'])->name('show_room_info');

// Route::get('/guest_users', [GuestController::class, 'ViewroomInfo'])->name('room_info');





// Route::post('/guest', [GuestController::class, 'passCheckInDate'])->name('store-dates');




// Route::post('/guest', [GuestController::class, 'from_roomTypes'])->name('show_date');

Route::get('/auth', [GuestController::class, 'viewLogin'])->name('login_User');

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

 require __DIR__.'/auth.php';
