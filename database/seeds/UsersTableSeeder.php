<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'  =>  'yousaf',
            'password'  =>  Hash::make('yousaf'),
            'active'    =>  true
        ]);

        DB::table('user_profiles')->insert([
            'email'     =>  'yousaf@gmail.com',
            'user_id'   =>  '1'
        ]);

        factory(App\User::class,20)->create()->each(function($u){
            $u->profile()->save(factory(App\UserProfile::class)->make());
        });



    }
}
