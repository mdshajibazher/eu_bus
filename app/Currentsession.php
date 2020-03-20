<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currentsession extends Model
{
    protected $table = 'current_session';
    protected $fillable = [
        'session_name','current',
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
