<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{    
    protected $fillable = [
    	"fullname",
    	"password",
    	"email"    
    ];

    protected $table = 'Users';

    public $timestamps = true;

    public function tasks()
    {
         return $this->hasMany('App\TaskAssign', 'user_id', 'id');
    }
}
