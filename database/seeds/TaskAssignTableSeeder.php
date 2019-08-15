<?php

use Illuminate\Database\Seeder;

class TaskAssignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taskassign')->insert([
        	'task_id' => "1",
            'user_id' => "1"
        ]);

        DB::table('taskassign')->insert([
            'task_id' => "1",
            'user_id' => "2"
        ]);

        DB::table('taskassign')->insert([
            'task_id' => "2",
            'user_id' => "3"
        ]);

        DB::table('taskassign')->insert([
            'task_id' => "3",
            'user_id' => "3"
        ]);
    }
}
