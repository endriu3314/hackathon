<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function attendance()
    {
        return $this->belongsToMany(EventAttendance::class);
    }

}
