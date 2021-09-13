<?php

namespace App\Http\Controllers\Shopping_lists;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeeklyListStoreRequest;
use App\Models\Shopping_lists\ShoppingList;
use App\Models\User;
use App\Models\Shopping_lists\WeeklyShoppingList;

class WeeklyShoppingListController extends Controller
{
    public function index()
    {
        $weeklyShoppingList = WeeklyShoppingList::where('team_id', auth()->user()->currentTeam->id)->first();

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
        $lastWeeklyList = WeeklyShoppingList::where('team_id', auth()->user()->currentTeam->id)->first();

        if ($lastWeeklyList){
            $lastWeeklyList->delete();
        }

        $weeklyShoppingList = WeeklyShoppingList::create([
            'shopping_date' => $request->date_to,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'team_id' => User::find(auth()->id())->currentTeam->id,
        ]);

        $shoppingLists = ShoppingList::where('team_id', auth()->user()->currentTeam->id)
            ->whereBetween('shopping_date', [$request->date_from, $request->date_to])
            ->get();


        foreach ($shoppingLists as $shoppingList){
            $shoppingList->weekly_shopping_list_id = $weeklyShoppingList->id;
            $shoppingList->save();
        }

        return redirect()->route('weekly_lists.index')->with('message', __('custom.global.messages.successfully_save'));
    }

    public function destroy(WeeklyShoppingList $weeklyShoppingList)
    {
        return $weeklyShoppingList->delete();
    }
}
