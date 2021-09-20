<?php

namespace App\Http\Controllers\Shopping_lists;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShoppingListRequest;
use App\Models\Shopping_lists\ShoppingList;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    /**
     * Get lists for the team - implement in livewire component
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('shopping_lists.index');
    }

    /**
     * @param StoreShoppingListRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Use observer to set team_id
     */
    public function store(StoreShoppingListRequest $request)
    {
        $id = ShoppingList::create($request->validated());

        return redirect()->route('shopping_lists.show', $id)
            ->with('message', __('custom.global.messages.successfully_save'));
    }

    public function show($id)
    {
        $shoppingList = ShoppingList::with('positions')
            ->where('team_id', auth()->user()->currentTeam->id)->with('positions')->findOrFail($id);

        ShoppingList::check_permission($shoppingList);

        return view('shopping_lists.show', compact('shoppingList', ));
    }

    public function edit(ShoppingList $shoppingList)
    {
        ShoppingList::check_permission($shoppingList);

        return view('shopping_lists.edit', compact('shoppingList'));
    }

    public function update(ShoppingList $shoppingList, StoreShoppingListRequest $request)
    {
        ShoppingList::check_permission($shoppingList);

        $shoppingList->update($request->validated());

        return back()->with('message', __('custom.global.messages.successfully_save'));
    }

    public function destroy(ShoppingList $shoppingList)
    {
        //TODO:: dodać usuwanie pozycji razem z lista

        ShoppingList::check_permission($shoppingList);

        $shoppingList->delete();

        return back()->with('message', __('custom.global.messages.successfully_archived'));
    }

    public function getArchivedLists()
    {
        $archivedLists = ShoppingList::with('positions')
            ->where('team_id', auth()->user()->currentTeam->id)
            ->onlyTrashed()->paginate(6);

        return view('shopping_lists.archivedLists', compact('archivedLists'));
    }

    public function editArchivedLists($id)
    {
        $shoppingList = ShoppingList::withTrashed()->findOrFail($id);

        ShoppingList::check_permission($shoppingList);

        return view('shopping_lists.restore', compact('shoppingList'));
    }

    public function restoreShoppingList(Request $request, $id)
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
    public function permanentlyDestroy($id)
    {
        ShoppingList::withTrashed()->findOrFail($id)->forceDelete();

        return back()->with('message', __('custom.global.messages.successfully_delete'));
    }
}
