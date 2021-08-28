<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToWeeklyShoppingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weekly_shopping_lists', function (Blueprint $table) {
            $table->string('name')->default('New weekly list')->after('id');
            $table->date('shopping_from')->default(today())->after('shopping_date');
            $table->date('shopping_to')->default(today())->after('shopping_from');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weekly_shopping_lists', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('shopping_from');
            $table->dropColumn('shopping_to');
        });
    }
}
