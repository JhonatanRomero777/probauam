<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decoded_json = file_get_contents('C:\xampp\htdocs\probauam\public\assets\json\forms.json');
        $tests_json = json_decode($decoded_json, false);

        foreach($tests_json as $current_form)
        {
            $form = new Form;
            $form->name = $current_form->name;
            $form->save();

            foreach($current_form->questions as $current_question)
            {
                $question = new Question;
                $question->form_id = $form->id;
                $question->name = $current_question->name;
                $question->save();

                foreach($current_question->answers as $current_answer)
                {
                    $answer = new Answer;
                        $answer->question_id = $question->id;
                        $answer->name = $current_answer->name;
                        $answer->score = $current_answer->score;
                        $answer->save();
                    }
                }
        }
    }
}