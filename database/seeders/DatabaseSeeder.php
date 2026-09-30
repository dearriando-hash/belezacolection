<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@belleza.com'],
            [
                'name' => 'Admin Belleza',
                'password' => 'password123',
            ]
        );
    }
}