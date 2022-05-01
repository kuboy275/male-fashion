<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(10),
            'image_path'=> $this->faker->imageUrl($width=1170, $height = 800)
        ];
    }
}
