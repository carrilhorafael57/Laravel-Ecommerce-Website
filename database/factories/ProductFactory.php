<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name(),
            'product_desc' => $this->faker->sentence(),
            'product_image' => $this->faker->imageUrl($width = 200, $height = 200),
            'quantity_in_stock' => $this->faker->randomDigit(),
            'price' => $this->faker->randomDigit(),
            'quantity_in_stock' => $this->faker->randomDigit(),
            'created_at' => null,
            'updated_at' => null,
        ];
    }
}
