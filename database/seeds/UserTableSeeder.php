<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name'      => str_random(10),
            'email'     => str_random(10).'@codingfaculty.com',
            'password'  => bcrypt('secret'),
            'role_id'   => 2,
            'is_active' => 1,
        ]);
    }
}
