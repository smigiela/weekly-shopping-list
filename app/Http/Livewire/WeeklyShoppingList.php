<?php

namespace App\Http\Livewire;

use App\Models\Position;
use App\Models\ShoppingList;
use Livewire\Component;

class WeeklyShoppingList extends Component
{
    public $shoppingList;
    public $positions = [];
    public $shoppingDate;
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->startDate = '2002-02-17';
        $this->endDate = '2022-02-17';
    }

    protected $rules = [
      'startDate' => ['required'],
      'endDate' => ['required']
    ];

    public function submit()
    {
        $validated = $this->validate();

        dd($validated);
        $startDate = $validated->startDate;

        $shoppingList = ShoppingList::with('positions')
            ->where('shopping_date', '>=', $validated->startDate);

        dd($shoppingList);
    }

    public function render()
    {
        $startDate = '2002-02-17';
        $endDate = '2022-02-17';

        $shoppingListsIds = ShoppingList::with('positions')
            ->where('team_id', auth()->user()->current_team_id)
            ->whereBetween('shopping_date', [$startDate, $endDate])->pluck('id')->toArray();

        $positions = Position::whereIn('shopping_list_id', $shoppingListsIds)->get();

        dd([$positions]);
        return view('livewire.weekly-shopping-list', compact('positions'));
    }
}
