<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('users')->truncate();
        \DB::table('posts')->truncate();
        \DB::table('roles')->truncate();
        \DB::table('categories')->truncate();

        factory(\App\User::class,10)->create()->each(function ($user){
            $user->posts()->save(factory(\App\Post::class)->make());
        });

        factory(\App\Role::class,3)->create();
        factory(\App\Category::class,3)->create();

        factory(\App\Photo::class,3)->create();

//        factory(\App\Post::class,10)->create();
//         $this->call(UserTableSeeder::class);
    }
}
