<?php

use App\Http\Controllers\PositionController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\WeeklyShoppingListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
  Route::resource('shopping_lists', ShoppingListController::class);
//  Route::get('get_weekly_list', [WeeklyShoppingList::class)->name('shopping_lists.weeklyList');
  //Route::post('set_weekly_list', [WeeklyShoppingListController::class, 'store'])->name('weekly_list.store'); // zakomentowałem żeby zrobić po swojemu :)
  //Route::post('set_weekly_list', [WeeklyShoppingListController::class, 'store'])->name('weekly_list.store');// zakomentowałem żeby zrobić po swojemu :)
  //Route::get('get_weekly_list', [WeeklyShoppingListController::class, 'index'])->name('shopping_lists.weeklyList');// zakomentowałem żeby zrobić po swojemu :)
  //Route::get('compose_weekly_list', [WeeklyShoppingListController::class, 'create'])->name('shopping_lists.composeWeeklyList'); // by adam


  Route::get('weekly_shopping_lists',           [WeeklyShoppingListController::class, 'index'])->name('weekly_shopping_lists.index'); // by adam
  Route::get('weekly_shopping_lists/create',    [WeeklyShoppingListController::class, 'create'])->name('weekly_shopping_lists.create'); // by adam
  Route::post('weekly_shopping_lists',          [WeeklyShoppingListController::class, 'store'])->name('weekly_shopping_lists.store'); // by adam



  Route::get('positions/restore/{position_id}',     [PositionController::class, 'restore'])->name('positions.restore');
  //Route::get('positions/mark_as_done/{position}', [PositionController::class, 'mark_as_done'])->name('positions.markAsDone');
  Route::get('positions/complete/{position}',           [PositionController::class  , 'mark_as_done'])->name('positions.markAsDone');
  Route::get('positions/unmark_as_done/{position}', [PositionController::class, 'unmark_as_done'])->name('positions.unmarkAsDone');
  Route::post('positions/{shopping_list}', [PositionController::class, 'store'])->name('positions.store');
  Route::resource('positions', PositionController::class, ['except' => 'store']);

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
