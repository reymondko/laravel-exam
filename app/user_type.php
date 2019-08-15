<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_type extends Model
{
    protected $fillable = [
    	"type"    
    ];

    protected $table = 'user_type';

    public $timestamps = true;

   
    public function users()
    {
        return $this->belongsto('App\users', 'usertype', 'id');
    }
}
