<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areaassign extends Model
{
    protected $table = 'bus_route_area';
    protected $fillable = [
        'route','area',
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
