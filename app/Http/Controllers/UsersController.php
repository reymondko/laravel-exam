<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Users;
use App\Tasks;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        #return $users;
        return  view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inputs= $request->all();

        $user = Users::create();
        return "user created";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= Users::find($id);

        #return $user;
        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    public function updateusertype(Request $request)
    {
       
        $user = Users::find($request->userid);
        
        $user->usertype = $request->typeID;

        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tasklist(Request $request, $id)
    {
        $assignedtasks = Users::find($id);
         
        $atask =  $assignedtasks->tasks;
        $x = json_decode($atask, TRUE);
        $task_ids = array_column($x, 'task_id');
        $tasks= Tasks::findMany($task_ids);

        return view('users.showtasks')->with('assignedtasks', $tasks);
      
    }

    public function AssignableUsers(Request $request)
    {
        $taskid=$request->taskid;
        $users = Users::leftJoin('TaskAssign', function($join)  use ($taskid){
            $join->on('users.id', '=', 'TaskAssign.user_id');
            $join->on('task_id','=',DB::raw("'".$taskid."'"));
          })->whereIn('usertype', [1, 2])
          ->select(DB::raw("'".$taskid."'as TaskID"), 'users.*','TaskAssign.id AS aid','TaskAssign.task_id AS tid','TaskAssign.user_id AS uid')->get();
        
        return view('users.assignusers')->with('users', $users);
    }
}
