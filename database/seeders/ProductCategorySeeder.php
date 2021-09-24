<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::insert(['name' => 'Warzywa i owoce', 'index' => 1]);
        ProductCategory::insert(['name' => 'Ryby i owoce morza', 'index' => 2]);
        ProductCategory::insert(['name' => 'Mięsa', 'index' => 3]);
        ProductCategory::insert(['name' => 'Nabiał', 'index' => 4]);
        ProductCategory::insert(['name' => 'Produkty zbożowe', 'index' => 5]);
        ProductCategory::insert(['name' => 'Przyprawy i dodatki', 'index' => 6]);
        ProductCategory::insert(['name' => 'Słodycze i przekąski', 'index' => 7]);
        ProductCategory::insert(['name' => 'Napoje', 'index' => 8]);
        ProductCategory::insert(['name' => 'Higiena osobista', 'index' => 9]);
        ProductCategory::insert(['name' => 'Dom', 'index' => 10]);
        ProductCategory::insert(['name' => 'Brak kategorii', 'index' => 11]);
    }
}
