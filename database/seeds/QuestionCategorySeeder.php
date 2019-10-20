<?php

use Illuminate\Database\Seeder;

class QuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_categories')->insert([
            'name' => 'Attitute'
        ]);

        DB::table('question_categories')->insert([
            'name' => 'Responsibility'
        ]);
    }
}
