<?php

namespace Database\Seeders;

use App\Models\Recipes\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::factory()->count(100)->create();
    }
}
