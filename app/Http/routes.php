<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users','UsersController');

Route::resource('tasks','TasksController');

Route::resource('taskassign','TaskAssignController');

Route::get('tasklist/{id?}', function($id=1){
   
    $assignedtasks = App\Users::find($id);
    #echo $assignedtasks;
    echo $assignedtasks->tasks;
    foreach($assignedtasks->tasks as $atask){
        $task = App\Tasks::find($atask->task_id);
        echo  "<br> ".$assignedtasks->fullname ."  assigned to". $task->subject."<br>";
    }
    #echo $users->tasks." ". $users->fullname . " ". $users->subject; 
    //echo $tasks;
});

Route::get('userlist_assigned/{id?}', function($id=1){
    
    $assignedusers = App\Tasks::find($id);
    #echo $assignedtasks;
    echo $assignedusers->users;
    foreach($assignedusers->users as $atask){
        $users = App\Users::find($atask->user_id);
        echo  "<br>".$assignedusers->subject   ."assigned to   ". $users->fullname."<br>";
    }
    #echo $users->tasks." ". $users->fullname . " ". $users->subject; 
    //echo $tasks;
});