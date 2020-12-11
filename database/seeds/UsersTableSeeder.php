<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'username' => 'yuri',
                'email' => 'yuri@gmail.com',
                'password' => bcrypt('yuri'),
                'role' => 'member',
            ],
            [
                'username' => 'lakis',
                'email' => 'lakis@gmail.com',
                'password' => bcrypt('lakis'),
                'role' => 'member',
            ],
        ]);
    }
}
