<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\ShoppingList;
use App\Models\WeeklyShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeeklyShoppingListController extends Controller
{
    public function index()
    {
//        $startDate = '2002-02-17';
//        $endDate = '2022-02-17';
//
//        $shoppingListsIds = ShoppingList::with('positions')
//            ->where('team_id', auth()->user()->current_team_id)
//            ->whereBetween('shopping_date', [$startDate, $endDate])->pluck('id')->toArray();
//
//        $positions = DB::table('positions')
//            ->where('deleted_at', '=', NULL)
//            ->whereIn('shopping_list_id', $shoppingListsIds)
//            ->groupBy('name')
//            ->selectRaw('id,name,amount,is_done,type, sum(amount) as sum')
//            ->get();
//
//        $positions = json_decode( json_encode($positions), true);
//        dd($positions);


        $weeklyList = WeeklyShoppingList::with('positionsByShoppingLists')->findOrFail(2);

        //        dd($weeklyList);


        return view('shopping_lists.weeklyShoppingList', compact('weeklyList'));
    }

    public function store(Request $request)
    {
        $weeklyShoppingList = WeeklyShoppingList::create([
            'team_id' => auth()->user()->currentTeam->id,
            'shopping_date' => $request->endDate
        ]);

        $shoppingListsToStore = ShoppingList::where('team_id', auth()->user()->currentTeam->id)
            ->whereBetween('shopping_date', [$request->startDate, $request->endDate])
            ->get();

        foreach ($shoppingListsToStore as $positionToStore){
            $weeklyShoppingList->shoppingLists()->save($positionToStore);
        }

        return back()->with('message', __('custom.global.messages.successfully_save'));
    }
}
