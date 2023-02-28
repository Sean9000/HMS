<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calendars extends Model
{
    use HasFactory;
    
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_no');
        // return $this->belongsTo(Room::class');
    }
}
