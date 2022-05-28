<?php

namespace App\Http\Controllers\Shopping_lists;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShoppingListRequest;
use App\Models\Shopping_lists\Position;
use App\Models\Shopping_lists\ShoppingList;
use App\Services\WeeklyShoppingListsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
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
     * Get lists for the team - implement in livewire component
     */
    public function index(): View
    {
        $weeklyShoppingList = $this->service->getWeeklyList();
        $shoppingLists = auth()->user()->currentTeam->shoppingLists;

        if (! $weeklyShoppingList){
           $weeklyPositions = [];
        } else {
            $weeklyPositions = $this->service->getWeeklyPositions();
        }


        return view('shopping_lists.index', compact('weeklyPositions', 'weeklyShoppingList', 'shoppingLists'));
    }

    /**
     * @param StoreShoppingListRequest $request
     * @return RedirectResponse
     *
     * Use observer to set team_id
     */
    public function store(StoreShoppingListRequest $request): RedirectResponse
    {
        $id = ShoppingList::create($request->validated());

        return redirect()->route('shopping_lists.edit', $id)
            ->with('message', __('custom.global.messages.successfully_save'));
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $shoppingList = ShoppingList::with('positions')
            ->where('team_id', auth()->user()->currentTeam->id)->findOrFail($id);

        $shoppingList->load(['positions' => function($query) {
            $query->orderBy('product_category_id');
        }]);

        ShoppingList::check_permission($shoppingList);

        return view('shopping_lists.show', compact('shoppingList'));
    }

    /**
     * @param ShoppingList $shoppingList
     * @return View
     */
    public function edit(ShoppingList $shoppingList): View
    {
        ShoppingList::check_permission($shoppingList);

        return view('shopping_lists.edit', compact('shoppingList'));
    }

    /**
     * @param ShoppingList $shoppingList
     * @param StoreShoppingListRequest $request
     * @return RedirectResponse
     */
    public function update(ShoppingList $shoppingList, StoreShoppingListRequest $request): RedirectResponse
    {
        ShoppingList::check_permission($shoppingList);

        $shoppingList->update($request->validated());

        return back()->with('message', __('custom.global.messages.successfully_save'));
    }

    /**
     * @param ShoppingList $shoppingList
     * @return RedirectResponse
     */
    public function destroy(ShoppingList $shoppingList): RedirectResponse
    {
        //TODO:: dodać usuwanie pozycji razem z lista

        ShoppingList::check_permission($shoppingList);

        $shoppingList->delete();

        return back()->with('message', __('custom.global.messages.successfully_archived'));
    }

    /**
     * Get archived lists - paginate by 6
     * @return View
     */
    public function getArchivedLists(): View
    {
        $archivedLists = ShoppingList::with('positions')
            ->where('team_id', auth()->user()->currentTeam->id)
            ->onlyTrashed()->paginate(6);

        return view('shopping_lists.archivedLists', compact('archivedLists'));
    }

    /**
     * Show form to change shopping date in restored list
     * @param $id
     * @return View
     */
    public function editArchivedLists($id): View
    {
        $shoppingList = ShoppingList::withTrashed()->findOrFail($id);

        ShoppingList::check_permission($shoppingList);

        return view('shopping_lists.restore', compact('shoppingList'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function restoreShoppingList(Request $request, $id): RedirectResponse
    {
        $shoppingList = ShoppingList::withTrashed()->findOrFail($id);

        ShoppingList::check_permission($shoppingList);

        $shoppingList->restore();
        $shoppingList->update(['shopping_date' => $request->shopping_date]);

        return redirect()->route('shopping_lists.index')
            ->with('message', __('custom.global.messages.successfully_restore'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permanentlyDestroy($id): RedirectResponse
    {
        $shoppingList = ShoppingList::withTrashed()->findOrFail($id)->forceDelete();

        ShoppingList::check_permission($shoppingList);

        return back()->with('message', __('custom.global.messages.successfully_delete'));
    }

    /**
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mark_as_done_position(Position $position)
    {
        Position::check_permission($position);

        $position->update(['is_done' => true]);
        return back();
    }

    /**
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unmark_as_done_position(Position $position)
    {
        Position::check_permission($position);

        $position->update(['is_done' => false]);

        return back();
    }
}
