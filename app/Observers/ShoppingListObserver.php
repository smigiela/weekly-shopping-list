<?php

namespace App\Observers;

use App\Models\Shopping_lists\ShoppingList;

class ShoppingListObserver
{
    /**
     * Handle the ShoppingList "created" event.
     *
     * @param ShoppingList $shoppingList
     * @return void
     */
    public function created(ShoppingList $shoppingList)
    {
        $shoppingList->update(['team_id' => auth()->user()->currentTeam->id]);
    }

    /**
     * Handle the ShoppingList "updated" event.
     *
     * @param ShoppingList $shoppingList
     * @return void
     */
    public function updated(ShoppingList $shoppingList)
    {
        //
    }

    /**
     * Handle the ShoppingList "deleted" event.
     *
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return void
     */
    public function deleted(ShoppingList $shoppingList)
    {
        //
    }

    /**
     * Handle the ShoppingList "restored" event.
     *
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return void
     */
    public function restored(ShoppingList $shoppingList)
    {
        //
    }

    /**
     * Handle the ShoppingList "force deleted" event.
     *
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return void
     */
    public function forceDeleted(ShoppingList $shoppingList)
    {
        //
    }
}
