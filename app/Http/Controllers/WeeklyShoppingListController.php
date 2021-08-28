<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\ShoppingList;
use App\Models\User;
use App\Models\WeeklyShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeeklyShoppingListController extends Controller
{
    public function index()
    {
        /**
         * w wierszu 19 na sztywno wbiłem nr WeeklyShoppingList, który ma się wyświetlać. Skonfiguruj to po swojemu.
         * linijki od 21 do 34 są tylko do wyświetlania logów w konsoli. Możesz sobie podejrzeć jak są wyciągane dane z relacji
        */
        $weeklyShoppingList = WeeklyShoppingList::find(5);
        error_log("==================================================================");
        error_log("weeklyShoppingList: ".$weeklyShoppingList);
        error_log("==================================================================");
        error_log("============================== Shopping lists: ===================");
        foreach ($weeklyShoppingList->shoppingLists as $shoppingList){
            error_log("shopping list: ". $shoppingList);
        }
        error_log("===================================================");
        error_log("   WEEKLY POSITIONS    ==============================");
        foreach ($weeklyShoppingList->positions as $position){
            error_log("Position: ".$position->id.", ".$position->name.", ".$position->amount." [".$position->type."]");
        }
        error_log("==================================================================");
        error_log("==================================================================");
        /**
         * to jest czarodziejska metoda, która robił kawał roboty z wykorzystaniem relacji i Twojego zapytania
         * grupującego. To jest super opcja, bo pozwala tak naprawdę zrobić zapytanie do kolekcji, co by nie przeszło
         * w inny sposób - a przynajmniej nie "selectRaw()".
         * Nie musisz żadnych agregacji już robić w widoku.
        */
        $weeklyShoppingList->load(['positions' => function($query) use (&$weeklyPositions){
            $weeklyPositions = $query->groupBy('name')
                ->selectRaw('positions.id,name,type, sum(amount) as sum, is_done')
                ->get();
        }]);

        $weeklyList = $weeklyPositions;
        return view('shopping_lists.weeklyShoppingList', compact('weeklyList'));
    }

    public function create(){
        return view('shopping_lists.createWeeklyShoppingList');
    }


    public function store(Request $request)
    {
        error_log("===================================================");
        error_log("List name: ".$request->name);
        error_log("date_from: ".$request->date_from);
        error_log("date_to: ".$request->date_to);
        error_log("===================================================");


        $weeklyShoppingList = WeeklyShoppingList::create([
            'name' => $request->name,
            'shopping_date' => $request->date_to,
            'shopping_from' => $request->date_from,
            'shopping_to' => $request->date_to,
            'team_id' => User::find(auth()->id())->currentTeam->id,
        ]);

        $shoppingLists = ShoppingList::where('team_id', auth()->user()->currentTeam->id)
            ->whereBetween('shopping_date', [$request->date_from, $request->date_to])
            ->get();

        error_log("===================================================");
        error_log("   LISTS TO STORE    ==============================");
        foreach ($shoppingLists as $shoppingList){
            $shoppingList->weekly_shopping_list_id = $weeklyShoppingList->id;
            $shoppingList->save();
            error_log("shopping list: ".$shoppingList->title." , weekly_shopping_list_id: ". $shoppingList->weekly_shopping_list_id);

        }


        error_log("===================================================");


       /* $weeklyShoppingList = WeeklyShoppingList::create([
            'team_id' => User::user(auth()->id())->currentTeam->id,
            'shopping_date' => $request->endDate
        ]);

        $shoppingListsToStore = ShoppingList::where('team_id', auth()->user()->currentTeam->id)
            ->whereBetween('shopping_date', [$request->startDate, $request->endDate])
            ->get();

        foreach ($shoppingListsToStore as $positionToStore){
            $weeklyShoppingList->shoppingLists()->save($positionToStore);
        }

        return back()->with('message', __('custom.global.messages.successfully_save'));*/
    }
}
