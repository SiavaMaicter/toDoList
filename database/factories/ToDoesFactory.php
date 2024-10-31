<?php

namespace Database\Factories;

use App\Models\Todoes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToDoes>
 */
class ToDoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Todoes::class;
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->text(100),
        ];
    }
}
