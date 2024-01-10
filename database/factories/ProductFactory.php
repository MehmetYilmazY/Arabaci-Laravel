<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'brand' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->year,
            'kms' => $this->faker->numberBetween(0, 100000),
            'engine' => $this->faker->word,
            'carType' => $this->faker->word,
            'horsePower' => $this->faker->numberBetween(50, 500),
            'color' => $this->faker->colorName,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'image' => $this->faker->imageUrl(450, 300),
        ];
    }
}
