<?php

use Illuminate\Database\Seeder;
use App\Model\Question_categorie;
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
            'name' => 'General'
        ]);

        // DB::table('question_categories')->insert([
        //     'name' => 'Permission'
        // ]);

        // DB::table('question_categories')->insert([
        //     'name' => 'Ethical'
        // ]);
    }
}
