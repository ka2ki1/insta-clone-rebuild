<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'テストユーザー',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'sub@example.com'],
            [
                'name' => 'サブユーザー',
                'password' => Hash::make('password'),
            ]
        );
    }
}
