<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    #[ArrayShape([
        'title' => "string",
        'body' => "string",
        'slug' => "string",
        'img' => "string",
        'created_at' => "\DateTime",
        'published_at' => "\Carbon\Carbon"
    ])]
    public function definition(): array
    {
        $title = $this->faker->sentence(6, true);
        $slug =  Str::substr(Str::lower(preg_replace('/\s+/', '-', $title )), 0, -1);

        // "Hello wold hello wold hello wold."
        // "hello-wold-hello-wold-hello-wold"
        // https://laravel.com/docs/8.x/helpers


        return [
            'title' => $title,
            'body' => $this->faker->paragraph(100, true),
            'slug' => $slug,
            'img' => 'https://via.placeholder.com/600/5F113B/FFFFFF/?text=LARAVEL:9.*',
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
            'published_at' => Carbon::now()
        ];
    }
}
