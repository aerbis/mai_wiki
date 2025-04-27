<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.ru',
            'role' => 'reader',
            'password' => Hash::make('user'),
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@user.ru',
            'role' => 'writer',
            'password' => Hash::make('user2'),
        ]);
    }
}
