<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tasks;
use App\Users;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::all();
        return  view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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
    public function assigneduser(Request $request)
    {
        $taskid = $request->taskid;
        $assignedusers = Tasks::find($taskid);
        $ausers = $assignedusers->users;
        
        $x = json_decode($ausers, TRUE);
        $user_ids = array_column($x, 'user_id');
        $users= Users::findMany($user_ids);

        return view('tasks.viewusers')->with('assignedusers', $users);
        #echo $assignedusers;
    }

    public function uploadFile()
    {
        //get the file
        $file = Input::file('file');

        //create a file path
        $path = 'uploads/';

        //get the file name
        $file_name = $file->getClientOriginalName();

        //save the file to your path
        $file->move($path , $file_name); //( the file path , Name of the file)

        //save that to your database
        $new_file = new Uploads(); //your database model
        $new_file->file_path = $path . $file_name;
        $new_file->save();

        //return something (sorry, this is a  habbit of mine)
        return 'something';
    }

}
