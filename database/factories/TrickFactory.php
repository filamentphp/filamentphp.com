<?php

namespace Database\Factories;

use App\Enums\TrickStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrickFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            'author_id' => User::factory(),
            'name' => $this->faker->word(),
            'slug' => implode('-', $this->faker->words()),
            'status' => $this->faker->randomElement([TrickStatus::DRAFT, TrickStatus::PENDING, TrickStatus::PUBLISHED]),
        ];
    }
}
