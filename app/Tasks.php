<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
	protected $fillable = [
    	"subject",
    	"body"    
    ];

    protected $table = 'Tasks';

    public $timestamps = true;

   
    public function users()
    {
        return $this->hasMany('App\TaskAssign', 'task_id', 'id');
    }
}
