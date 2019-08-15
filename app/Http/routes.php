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

Route::resource('assigneduser','TasksController@assigneduser');

Route::resource('updateusertype','UsersController@updateusertype');

Route::resource('assignusers','UsersController@AssignableUsers');

Route::resource('tasklist/{id?}','UsersController@tasklist');

Route::resource('deleteAssignedUser','TaskAssignController@deleteUser');

Route::resource('assignUser','TaskAssignController@create');
