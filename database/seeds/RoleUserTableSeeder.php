<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the first user
        $user = User::get()->first();

        // Get the 'admin' and 'member' roles
        $adminRole = Role::where('name', 'admin')->get()->first();
        $memberRole = Role::where('name', 'member')->get()->first();

        // Assign both roles to the user
        $user->roles()->save($adminRole);
        $user->roles()->save($memberRole);
    }
}
