<?php

namespace Database\Seeders;

use App\Models\Shopping_lists\ShoppingList;
use Illuminate\Database\Seeder;

class ShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShoppingList::unsetEventDispatcher();
        ShoppingList::factory()->count(20)->create();
    }
}
