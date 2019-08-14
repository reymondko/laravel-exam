<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([
            'type' => "Employees"
        ]);
        DB::table('user_type')->insert([
            'type' => "Subcontractors"
        ]);
        DB::table('user_type')->insert([
            'type' => "Clients"
        ]);
    }
}
