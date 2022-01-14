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
         $products = Plugin::factory()
             ->count(100)
             ->create();

         foreach ($products as $product) {
             foreach (range(0, random_int(0, 100)) as $i) {
                 $product->purchasers()->attach(User::factory()->create());
             }
         }
    }
}
