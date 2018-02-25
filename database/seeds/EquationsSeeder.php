<?php

use Illuminate\Database\Seeder;

class EquationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equations')->insert([
            'question' => '0 + 1 =',
            'answer' => '1',
            'choice1' => '0',
            'choice2' => '2',
            'choice3' => '1', // Answer
            'choice4' => '4',
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 1 =',
            'answer' => '2',
            'choice1' => '1',
            'choice2' => '2', // Answer
            'choice3' => '3',
            'choice4' => '4',
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 2 =',
            'answer' => '3',
            'choice1' => '5',
            'choice2' => '2',
            'choice3' => '1',
            'choice4' => '3', // Answer
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 3 =',
            'answer' => '4',
            'choice1' => '4', // Answer
            'choice2' => '1',
            'choice3' => '5',
            'choice4' => '3',
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 4 =',
            'answer' => '5',
            'choice1' => '5', // Answer
            'choice2' => '3',
            'choice3' => '2',
            'choice4' => '1',
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 5 =',
            'answer' => '6',
            'choice1' => '5',
            'choice2' => '0',
            'choice3' => '8',
            'choice4' => '6', // Answer
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 6 =',
            'answer' => '7',
            'choice1' => '7', // Answer
            'choice2' => '4',
            'choice3' => '5',
            'choice4' => '6',
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 7 =',
            'answer' => '8',
            'choice1' => '8', // Answer
            'choice2' => '5',
            'choice3' => '10',
            'choice4' => '9',
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 8 =',
            'answer' => '9',
            'choice1' => '11',
            'choice2' => '7',
            'choice3' => '9', // Answer
            'choice4' => '8',
        ]);

        DB::table('equations')->insert([
            'question' => '1 + 9 =',
            'answer' => '10',
            'choice1' => '11',
            'choice2' => '10', // Answer
            'choice3' => '8',
            'choice4' => '9',
        ]);
    }
}
