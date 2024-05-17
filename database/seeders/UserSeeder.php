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
        User::create([
            'name' => 'Fardan',
            'email' => 'fardan@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'pegawai',
        ]);
        User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'pegawai',
        ]);
    }
}
