<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'departments';
    protected $fillable = [
        'name','description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function users(){
        return $this->belongsTo('App\User');
    }

}
