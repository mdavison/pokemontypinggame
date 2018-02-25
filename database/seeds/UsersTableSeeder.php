<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Morgan',
            'email' => 'morgan@example.com',
            'password' => bcrypt('password'),
            'confirmed' => 1,
        ]);
    }
}
