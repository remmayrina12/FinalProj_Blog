<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
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
        $photosArray = ['1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg', '6.jpeg', '7.jpeg'];
        return [
            'title' => $this->faker->sentence, // Generate a random sentence
            'author' => $this->faker->name,
            'publish_at' => $this->faker->date, // Generate a random date
            'content' => $this->faker->paragraph, // Generate a random paragraph
            'photos' => json_encode($this->faker->randomElements($photosArray, rand(1, count($photosArray)))),
            'user_id' => User::factory(),     
          ];
    }
}
