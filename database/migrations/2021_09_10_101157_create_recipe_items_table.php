<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount');
            $table->enum('amount_type', ['quantity', 'weight', 'volume'])->nullable();
            $table->foreignId('recipe_id')->constrained('recipes');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_items');
    }
}
