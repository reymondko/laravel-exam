<?php

use App\User;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Tasks')->insert([
            'subject' => "task ".Str::random(10),
            'body' => Str::random(30),
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
    }
}
