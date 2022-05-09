<?php

namespace Database\Factories\Recipes;

use App\Models\Recipes\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Przepis na ...',
            'description' => 'testowy opis przepisu.',
            'team_id' => rand(1,5),
            'user_id' => rand(1,10),
            'is_public' => rand(0,1)
        ];
    }
}
