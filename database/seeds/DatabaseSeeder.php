<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([User_typesTable::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([QuestionCategorySeeder::class]);
    }
}
