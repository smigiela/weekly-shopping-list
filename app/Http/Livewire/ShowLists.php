<?php

namespace App\Http\Livewire;

use App\Models\Shopping_lists\ShoppingList;
use App\Models\Shopping_lists\WeeklyShoppingList;
use App\Services\WeeklyShoppingListsService;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLists extends Component
{
    use WithPagination;

    public function render()
    {
        $shoppingLists = ShoppingList::with('positions')
            ->where('team_id', auth()->user()->currentTeam->id)
            ->orderBy('shopping_date')
            ->paginate(3);

        $shoppingLists->load(['positions' => function($query) {
            $query->orderBy('product_category_id');
        }]);

        return view('livewire.show-lists', [
            'shoppingLists' => $shoppingLists
        ]);
    }
}
