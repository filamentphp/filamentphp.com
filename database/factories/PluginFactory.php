<?php

namespace Database\Factories;

use App\Enums\PluginStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PluginFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            'docs' => $this->faker->text(),
            'author_id' => User::factory(),
            'name' => $this->faker->word(),
            'slug' => implode('-', $this->faker->words()),
            'status' => $this->faker->randomElement([PluginStatus::Draft, PluginStatus::Pending, PluginStatus::Published]),
        ];
    }
}
