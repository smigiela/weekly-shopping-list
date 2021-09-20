<?php

namespace App\Http\Controllers\Shopping_lists;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeeklyListStoreRequest;
use App\Services\WeeklyShoppingListsService;

class WeeklyShoppingListController extends Controller
{

    /**
     * @var WeeklyShoppingListsService
     */
    private $service;

    public function __construct(WeeklyShoppingListsService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $weeklyShoppingList = $this->service->getWeeklyList();

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
        $this->service->deleteLatestList();

        $this->service->saveWeeklyListWithPositions($request->validated());

        return redirect()->route('weekly_lists.index')->with('message', __('custom.global.messages.successfully_save'));
    }
}
