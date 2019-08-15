<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    protected $fillable = [
    	"filename",
    	"task_id"    
    ];

 	protected $table = 'Uploads';

    public $timestamps = true;

    public function tasks()
    {
        return $this->belongsTo('App\Task', 'id', 'task_id');
    }
}
