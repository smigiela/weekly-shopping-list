<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TeamSeeder::class,
            ShoppingListSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            PositionSeeder::class,
//        RecipeSeeder::class,
        ]);
    }
}
