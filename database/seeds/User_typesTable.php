<?php

use Illuminate\Database\Seeder;
use App\Model\User_type;

class User_typesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user_types = [
            [
                'user_type' => 'admin',
            	'created_at' => now(),
            	'updated_at' => now()
            ],
            [
                'user_type' => 'stuff',
            	'created_at' => now(),
            	'updated_at' => now()
            ],
            [
                'user_type' => 'security',
            	'created_at' => now(),
            	'updated_at' => now()
            ],
        ];
        foreach($user_types as $user_type){
            User_type::create($user_type);
        }
    }
}
