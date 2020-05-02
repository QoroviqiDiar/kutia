<?php

use App\Role;
use App\User;
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
        $adminRole = Role::where('name', Role::ADMIN)->first();
        $authorRole = Role::where('name', Role::AUTHOR)->first();

        User::truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        $diar = User::create([
            'name' => 'diar',
            'email' => 'diar@diar.com',
            'password' => bcrypt('123456')
        ]);

        $admin->roles()->attach($adminRole);
        $diar->roles()->attach($authorRole);
    }
}
