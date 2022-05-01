<?php

namespace Database\Factories;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);

        return [
            'title' => $title,
            'slug'  => Str::slug($title),
            'content' => $this->faker->sentence(20),
            'image_path'=> $this->faker->imageUrl($width=360, $height = 270),
            'user_id' => \App\Models\User::factory(),
        ];

    }
}
