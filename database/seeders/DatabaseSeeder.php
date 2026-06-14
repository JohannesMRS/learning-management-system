<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Johannes',
            'email' => 'johannes12@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'registration_code' => 'XMI-455',
        ]);

    }
}
