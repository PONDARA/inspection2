<?php

use Illuminate\Database\Seeder;
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
            'name' => 'dara',
            'email' => 'dara@gmail.com',
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'user_type_id'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
