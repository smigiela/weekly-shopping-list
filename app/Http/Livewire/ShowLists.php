<?php

namespace App\Http\Livewire;

use App\Models\ShoppingList;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLists extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.show-lists', [
            'shoppingLists' => auth()->user()->shoppingLists()->with('positions')
                ->orderBy('shopping_date')->paginate(6)
        ]);
    }
}
