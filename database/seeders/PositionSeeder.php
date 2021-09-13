<?php

namespace Database\Seeders;

use App\Models\Shopping_lists\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::factory()->count(60)->create();
    }
}
