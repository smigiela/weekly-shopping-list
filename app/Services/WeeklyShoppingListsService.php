<?php

namespace App\Services;

use App\Models\Shopping_lists\ShoppingList;
use App\Models\Shopping_lists\WeeklyShoppingList;
use App\Models\User;

class WeeklyShoppingListsService
{
//    /**
//     * Check weekly shopping list exist by team_id and show (or no) menu item
//     * @param $team_id
//     * @return bool|void
//     */
//    public static function checkIfExist($team_id): bool
//    {
//        $weeklyShoppingList = WeeklyShoppingList::where('team_id', $team_id)->first();
//        if (! $weeklyShoppingList){
//            return false;
//        }
//        if ($weeklyShoppingList) {
//            return true;
//        }
//    }

    /**
     * @return mixed
     */
    public function getWeeklyList()
    {
        return WeeklyShoppingList::where('team_id', auth()->user()->currentTeam->id)->first();
    }

    public function getWeeklyPositions()
    {
        $this->getWeeklyList()->load(['positions' => function($query) use (&$weeklyPositions){
            $weeklyPositions = $query->orderBy('product_category_id')->groupBy('name', 'type')
                ->selectRaw('positions.id,name,type, sum(amount) as sum, is_done')
                ->get();
        }]);

        return $weeklyPositions;
    }

    /**
     * Delete latest shopping list, because team can has only one weekly list in the same time
     */
    public function deleteLatestList(): void
    {
        $lastWeeklyList = WeeklyShoppingList::where('team_id', auth()->user()->currentTeam->id)->first();

        if ($lastWeeklyList){
            $lastWeeklyList->delete();
        }
    }

    /**
     * save weekly shopping list with position
     * @param $validated
     */
    public function saveWeeklyListWithPositions($validated): void
    {
        $weeklyShoppingList = WeeklyShoppingList::create([
            'shopping_date' => $validated['date_to'],
            'date_from' => $validated['date_from'],
            'date_to' => $validated['date_to'],
            'team_id' => User::find(auth()->id())->currentTeam->id,
        ]);

        $shoppingLists = ShoppingList::where('team_id', auth()->user()->currentTeam->id)
            ->whereBetween('shopping_date', [$validated['date_from'], $validated['date_to']])
            ->get();


        foreach ($shoppingLists as $shoppingList){
            $shoppingList->weekly_shopping_list_id = $weeklyShoppingList->id;
            $shoppingList->save();
        }
    }
}
