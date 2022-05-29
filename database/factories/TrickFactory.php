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
            'author_id' => User::factory(),
            'content' => $this->faker->text(),
            'slug' => implode('-', $this->faker->words()),
            'status' => $this->faker->randomElement([TrickStatus::Draft, TrickStatus::Pending, TrickStatus::Published]),
            'title' => $this->faker->word(),
        ];
    }
}
