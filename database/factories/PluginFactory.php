<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PluginFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            'docs' => $this->faker->text(),
            'name' => $this->faker->sentence(),
            'author_id' => User::factory(),
            'package_name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(0, 50),
            'slug' => implode('-', $this->faker->words()),
        ];
    }
}
