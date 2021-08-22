<?php

use App\Http\Controllers\PositionController;
use App\Http\Controllers\ShoppingListController;
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
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
  Route::resource('shopping_lists', ShoppingListController::class);

  Route::get('positions/restore/{position_id}', [PositionController::class, 'restore'])->name('positions.restore');
  Route::get('positions/mark_as_done/{position}', [PositionController::class, 'mark_as_done'])->name('positions.markAsDone');
  Route::get('positions/unmark_as_done/{position}', [PositionController::class, 'unmark_as_done'])->name('positions.unmarkAsDone');
  Route::post('positions/{shopping_list}', [PositionController::class, 'store'])->name('positions.store');
  Route::resource('positions', PositionController::class, ['except' => 'store']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
