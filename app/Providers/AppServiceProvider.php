<?php

namespace App\Providers;

use App\Models\Position;
use App\Models\ShoppingList;
use App\Observers\PositionObserver;
use App\Observers\ShoppingListObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ShoppingList::observe(ShoppingListObserver::class);
        Position::observe(PositionObserver::class);
    }
}
