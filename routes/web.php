<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Recipes\RecipeController;
use App\Http\Controllers\Recipes\RecipeItemController;
use App\Http\Controllers\Shopping_lists\PositionController;
use App\Http\Controllers\Shopping_lists\ShoppingListController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Shopping_lists\WeeklyShoppingListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

  Route::get('shopping_lists/archived/{shopping_list}', [ShoppingListController::class, 'editArchivedLists'])
      ->name('shopping_lists.editArchivedList');
  Route::put('shopping_lists/{shopping_list}/restore', [ShoppingListController::class, 'restoreShoppingList'])
      ->name('shopping_lists.restore');
  Route::get('shopping_lists/archived', [ShoppingListController::class, 'getArchivedLists'])
      ->name('shopping_lists.getArchived');
  Route::delete('shopping_lists/{id}', [ShoppingListController::class, 'permanentlyDestroy'])
      ->name('shopping_lists.permanentlyDestroy');
  Route::resource('shopping_lists', ShoppingListController::class);

  Route::get('weekly_shopping_lists', [WeeklyShoppingListController::class, 'index'])
      ->name('weekly_lists.index');
  Route::get('weekly_shopping_lists/create', [WeeklyShoppingListController::class, 'create'])
      ->name('weekly_lists.create');
  Route::post('weekly_shopping_lists', [WeeklyShoppingListController::class, 'store'])
      ->name('weekly_lists.store');

  Route::get('positions/restore/{position_id}', [PositionController::class, 'restore'])
      ->name('positions.restore');
  Route::get('positions/complete/{position}', [PositionController::class  , 'mark_as_done'])
      ->name('positions.markAsDone');
  Route::get('positions/unmark_as_done/{position}', [PositionController::class, 'unmark_as_done'])
      ->name('positions.unmarkAsDone');
  Route::post('positions/{shoppingList}', [PositionController::class, 'store'])->name('positions.store');
  Route::resource('positions', PositionController::class, ['except' => 'store']);

  Route::view('recipes', 'recipes.index')->name('recipes.index');
  Route::resource('recipes', RecipeController::class);

  Route::post('recipe_items/{recipe}', [RecipeItemController::class, 'store'])->name('recipe_items.store');
  Route::resource('recipes_items', RecipeItemController::class, ['except' => 'store']);
});

Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('settings.changeLocale');

Route::get('/subscription', [SubscriptionController::class, 'show'])->name('subscription.show');
Route::post('/subscription/purchase', [SubscriptionController::class, 'purchase'])->name('subscription.purchase');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
