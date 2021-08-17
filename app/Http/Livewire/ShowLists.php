<?php

namespace App\Http\Livewire;

use App\Models\ShoppingList;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLists extends Component
{
    use WithPagination;

    public function check_date($shoppingList)
    {
        if ($shoppingList->shopping_date < now()) {
            return true;
        }
    }

    public function render()
    {
        return view('livewire.show-lists', [
            'shoppingLists' => auth()->user()->shoppingLists()->orderBy('shopping_date')->paginate(6)
//            'shoppingLists' => ShoppingList::orderBy('shopping_date')->paginate(6)
        ]);
    }
}
