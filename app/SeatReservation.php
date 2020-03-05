<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model
{
    protected $table = 'seat_reservations';
    protected $fillable = [
        'student', 'bus','seat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
