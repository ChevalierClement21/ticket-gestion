<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
        ]);

        $dev = User::create([
            'name' => 'Dev',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('devdev'),
        ]);

        $userTest = User::create([
            'name' => 'UserUser',
            'email' => 'user@gmail.com',
            'password' => Hash::make('useruser'),
        ]);

        $user = User::factory(10)->create();

    }
}
