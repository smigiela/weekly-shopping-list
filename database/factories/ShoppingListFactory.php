<?php

namespace Database\Factories;

use App\Models\ShoppingList;
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
            'title' => $this->faker->word
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (ShoppingList $shoppingList) {
           $shoppingList->users()->attach(rand(1,3));
        });
    }
}
