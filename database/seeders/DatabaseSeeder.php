<?php

namespace Database\Seeders;

use App\Models\Plugin;
use App\Models\User;
use Database\Factories\PluginFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         Plugin::factory()
             ->count(100)
             ->create();
    }
}
