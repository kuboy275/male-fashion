<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name  = $this->faker->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'price' => $this->faker->numberBetween($min = 12.11 ,$max = 99.99),
            'image_path_master'=> $this->faker->imageUrl($width=250, $height = 250),
            'content' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
