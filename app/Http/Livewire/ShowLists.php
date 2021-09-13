<?php

namespace App\Http\Livewire;

use App\Models\Shopping_lists\ShoppingList;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLists extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.show-lists', [
            'shoppingLists' => ShoppingList::with('positions')
                ->where('team_id', auth()->user()->currentTeam->id)
                ->orderBy('shopping_date')
                ->paginate(6)
        ]);
    }
}
