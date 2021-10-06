<?php

namespace App\Http\Controllers\Shopping_lists;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeeklyListStoreRequest;
use App\Models\Shopping_lists\Position;
use App\Models\Shopping_lists\WeeklyShoppingList;
use App\Services\WeeklyShoppingListsService;
use Barryvdh\DomPDF\Facade as PDF;

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

        $weeklyPositions = $this->service->getWeeklyPositions();

        return view('shopping_lists.weeklyShoppingList', compact('weeklyShoppingList', 'weeklyPositions'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        return view('shopping_lists.createWeeklyShoppingList');
    }

    /**
     * @param WeeklyListStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WeeklyListStoreRequest $request)
    {
        $this->service->deleteLatestList();

        $this->service->saveWeeklyListWithPositions($request->validated());

        return redirect()->route('weekly_lists.index')->with('message', __('custom.global.messages.successfully_save'));
    }

    /**
     * @param WeeklyShoppingList $weeklyShoppingList
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(WeeklyShoppingList $weeklyShoppingList)
    {
        $this->service->getWeeklyList()->delete();

        return redirect()->route('shopping_lists.index');
    }

    /**
     * @param WeeklyShoppingList $weeklyShoppingList
     * @return mixed
     */
    public function downloadPdf(WeeklyShoppingList $weeklyShoppingList)
    {
        $weeklyPositions = $this->service->getWeeklyPositions();

        view()->share(['weeklyShoppingList' => $weeklyShoppingList,'weeklyPositions' => $weeklyPositions]);
        $pdf = PDF::loadView('pdf.weeklyList');

        return $pdf->setPaper('a4')->stream();
    }

    /**
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mark_as_done_weekly_positions(Position $position)
    {
        Position::check_permission($position);

        foreach ($position->shoppingList->weeklyShoppingList->positions as $toBeDone){
            if($position->name == $toBeDone->name && $position->type == $toBeDone->type) {
                $toBeDone->update(['is_done' => true]);
            }
        }
        return back();
    }

    /**
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unmark_as_done_weekly_positions(Position $position)
    {
        Position::check_permission($position);

        foreach ($position->shoppingList->weeklyShoppingList->positions as $toBeUndone) {
            if($position->name == $toBeUndone->name && $position->type == $toBeUndone->type) {
                $toBeUndone->update(['is_done' => false]);
            }
        }

        return back();
    }
}
