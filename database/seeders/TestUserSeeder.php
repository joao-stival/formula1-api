<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Cadinho',
            'email' => 'cadinho@gmail.com',
            'password' => Hash::make('mel172217'),
            'phone' => '11999999999',
            'birth' => '1990-01-01',
            'photo' => null,
        ]);
    }
}
