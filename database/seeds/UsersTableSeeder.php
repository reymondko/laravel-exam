<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            'fullname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'usertype' => 1,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);

        DB::table('Users')->insert([
            'fullname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'usertype' => 2,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);

        DB::table('Users')->insert([
            'fullname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'usertype' => 3,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
    }
}
