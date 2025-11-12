<?php

namespace Database\Factories;
use App\Models\Author;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'biography' => $this->faker->paragraph(3),
            'website' => $this->faker->url(),
            'photo' => 'images/authors/default.jpg',
            'id_country' => Country::inRandomOrder()->value('id') ?? 1,
        ];
    }
}
