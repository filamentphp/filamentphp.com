<?php

namespace Database\Seeders;

use App\Models\Plugin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Plugin::factory()
            ->count(100)
            ->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@filamentphp.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}
