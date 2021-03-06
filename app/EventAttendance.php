<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
