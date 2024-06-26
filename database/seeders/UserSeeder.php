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
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'lastname' => 'Colorin',
            'username' => 'admin.colorin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
