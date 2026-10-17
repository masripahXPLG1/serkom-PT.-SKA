<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'adminptsk@gmail.com'],
            [
                'name' => 'AdminPTSK',
                'password' => Hash::make('adminPTSK1234'),
                'email_verified_at' => now(),
            ]
        );
    }
}