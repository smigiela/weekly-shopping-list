<?php

namespace Database\Factories\Shopping_lists;

use App\Models\Shopping_lists\ShoppingList;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShoppingList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'shopping_date' => $this->faker->date,
            'team_id' => rand(1,5)
        ];
    }

}
