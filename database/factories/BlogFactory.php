<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_min = User::pluck('id')->min();
        $id_max = User::pluck('id')->max();
        return [
            'title' => fake()->sentence(),
            'deskripsi' => fake()->paragraph(),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'user_id' => fake()->numberBetween($id_min, $id_max)
        ];
    }
}
