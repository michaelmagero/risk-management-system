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
        DB::table('users')->insert(array(
            'name' => 'Dev',
            'lastname' => 'SuperDev',
            'email' => 'dev@retex.co.ke',
            'password' => Hash::make('Yurigagarin254$'),
            'role' => 'dev',
        ));

        DB::table('users')->insert(array(
            'name' => 'Admin',
            'lastname' => 'Administrator',
            'email' => 'admin@retex.co.ke',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ));
    }
}
