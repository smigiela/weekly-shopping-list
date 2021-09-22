<?php

namespace Database\Factories\Shopping_lists;

use App\Models\Shopping_lists\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'amount' => $this->faker->numberBetween(1,5000),
            'type' => $this->faker->randomElement(['weight', 'quantity']),
            'shopping_list_id' => rand(1,20),
            'product_category_id' => rand(1,10)
        ];
    }
}
