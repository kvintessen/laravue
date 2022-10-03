<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['subject' => "string", 'body' => "string"])]
    public function definition(): array
    {
        return [
            'subject' => $this->faker->sentence('3'),
            'body' => $this->faker->paragraph('3', false),
        ];
    }
}
