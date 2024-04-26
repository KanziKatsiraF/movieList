<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'username' => 'admin',
            'phone' => '0823812328',
            'dob' => '2000-01-08',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    }
}
