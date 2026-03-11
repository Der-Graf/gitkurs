<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'due_date' => fake()->dateTimeBetween('now', '+6 week'),
            'user_id'  => User::factory(), //user_id ist Fremdschlüssel, muss daher gesetzt werden
            'status' => fake()->randomElement(['open','closed']),
            'notes' => fake()->optional()->text(50,4),
        ];
    }
}
