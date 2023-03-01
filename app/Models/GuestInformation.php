<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestInformation extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'guest_id');
    }
    
    public function guest_information()
    {
        return $this->belongsTo(Reservation::class, 'guest_id');
    }

}
