<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeeklyListStoreRequest;
use App\Models\ShoppingList;
use App\Models\User;
use App\Models\WeeklyShoppingList;
use Illuminate\Http\Request;

class WeeklyShoppingListController extends Controller
{
    public function index()
    {
        $weeklyShoppingList = WeeklyShoppingList::where('team_id', auth()->user()->currentTeam->id)
            ->orderByDesc('shopping_date')->latest()->first();

        if (! $weeklyShoppingList){
            abort(404);
        }

        $weeklyShoppingList->load(['positions' => function($query) use (&$weeklyPositions){
            $weeklyPositions = $query->groupBy('name')
                ->selectRaw('positions.id,name,type, sum(amount) as sum, is_done')
                ->get();
        }]);

        return view('shopping_lists.weeklyShoppingList', compact('weeklyShoppingList', 'weeklyPositions'));
    }

    public function create(){
        return view('shopping_lists.createWeeklyShoppingList');
    }


    public function store(WeeklyListStoreRequest $request)
    {
        $weeklyShoppingList = WeeklyShoppingList::create([
            'shopping_date' => $request->date_to,
            'shopping_from' => $request->date_from,
            'shopping_to' => $request->date_to,
            'team_id' => User::find(auth()->id())->currentTeam->id,
        ]);

        $shoppingLists = ShoppingList::where('team_id', auth()->user()->currentTeam->id)
            ->whereBetween('shopping_date', [$request->date_from, $request->date_to])
            ->get();


        foreach ($shoppingLists as $shoppingList){
            $shoppingList->weekly_shopping_list_id = $weeklyShoppingList->id;
            $shoppingList->save();
        }

        return back()->with('message', __('custom.global.messages.successfully_save'));
    }

    public function destroy()
    {

    }
}
