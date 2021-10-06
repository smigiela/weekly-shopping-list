<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentProcessorController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Recipes\RecipeController;
use App\Http\Controllers\Recipes\RecipeItemController;
use App\Http\Controllers\Shopping_lists\PositionController;
use App\Http\Controllers\Shopping_lists\ShoppingListController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Shopping_lists\WeeklyShoppingListController;
use Illuminate\Support\Facades\Route;

// home page
Route::get('/', fn() => view('welcome'))->name('welcome');

Route::get('balance',[PaymentProcessorController::class, 'getBalance'])->name('admin.getBalance');

    // admin views
    Route::get('/admin/dashboard',[DashboardController::class, 'index']);
    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    // products
    Route::get('/ajax-autocomplete-search', [ProductController::class, 'selectSearch']);

    // shopping lists
    Route::get('shopping_lists/archived/{shopping_list}', [ShoppingListController::class, 'editArchivedLists'])
        ->name('shopping_lists.editArchivedList');
    Route::put('shopping_lists/{shopping_list}/restore', [ShoppingListController::class, 'restoreShoppingList'])
        ->name('shopping_lists.restore');
    Route::get('shopping_lists/archived', [ShoppingListController::class, 'getArchivedLists'])
        ->name('shopping_lists.getArchived');
    Route::delete('shopping_lists/archived/{id}', [ShoppingListController::class, 'permanentlyDestroy'])
        ->name('shopping_lists.permanentlyDestroy');
    Route::get('shopping_lists/complete/{position}', [ShoppingListController::class, 'mark_as_done_position'])
        ->name('shopping_lists.markAsDonePosition');
    Route::get('shopping_lists/unmark_as_done/{position}', [ShoppingListController::class, 'unmark_as_done_position'])
        ->name('shopping_lists.unmarkAsDonePosition');
    Route::resource('shopping_lists', ShoppingListController::class);

    // weekly list
    Route::get('weekly_shopping_lists', [WeeklyShoppingListController::class, 'index'])
        ->name('weekly_lists.index');
    Route::get('weekly_shopping_lists/create', [WeeklyShoppingListController::class, 'create'])
        ->name('weekly_lists.create');
    Route::post('weekly_shopping_lists', [WeeklyShoppingListController::class, 'store'])
        ->name('weekly_lists.store');
    Route::get('weekly_shopping_lists/{weeklyShoppingList}/downloadpdf', [WeeklyShoppingListController::class, 'downloadPdf'])
        ->name('weekly_lists.downloadpdf');
    Route::get('weekly_shopping_lists/complete/{position}', [WeeklyShoppingListController::class, 'mark_as_done_weekly_positions'])
        ->name('weekly_lists.markAsDoneWeeklyPositions');
    Route::get('weekly_shopping_lists/unmark_as_done/{position}', [WeeklyShoppingListController::class, 'unmark_as_done_weekly_positions'])
        ->name('weekly_lists.unmarkAsDoneWeklyPositions');

    // positions
    Route::get('positions/restore/{position_id}', [PositionController::class, 'restore'])
        ->name('positions.restore');
    Route::post('positions/{shoppingList}', [PositionController::class, 'store'])->name('positions.store');
    Route::resource('positions', PositionController::class, ['except' => 'store']);

    // favourites products
    Route::get('/products', [FavouriteController::class, 'index'])->name('products.index');
    Route::get('products/{product}/fav', [FavouriteController::class, 'addProductToFavourites'])
        ->name('products.addToFav');
    Route::get('products/{product}/unfav', [FavouriteController::class, 'removeProductFromFavourites'])
        ->name('products.removeFromFav');

    // recipes
    Route::get('share_to_team/recipes/{recipe}', [RecipeController::class, 'share_to_team'])
        ->name('recipe.shareToTeam');
    Route::get('share_to_public/recipes/share_to_public/{recipe}', [RecipeController::class, 'share_to_public'])
        ->name('recipe.shareToPublic');
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
