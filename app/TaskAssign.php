<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
    protected $fillable = [
    	"task_id",
    	"user_id"    
    ];

    protected $table = 'TaskAssign';

    public $timestamps = true;
    
    public function users()
    {
        #return $this->belongsToMany('App\Tasks'));
        return $this->belongsToMany('App\Users','user_id');
    }
    public function tasks()
    {
        #return $this->belongsToMany('App\Tasks'));
        return $this->belongsToMany('App\Tasks','task_id');
    }
}
