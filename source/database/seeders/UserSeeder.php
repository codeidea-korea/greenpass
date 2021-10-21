<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'root',
            'name'     => 'Super Admin',
            'type'     => 'admin',
            'code'     => generateRandomString(),
            'email'    => '',
            'password' => Hash::make('root'),
        ]);
    }
}
