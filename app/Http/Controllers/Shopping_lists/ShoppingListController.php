<?php

namespace App\Http\Controllers\Shopping_lists;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShoppingListRequest;
use App\Models\Shopping_lists\ShoppingList;

class ShoppingListController extends Controller
{
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
        ShoppingList::check_permission($shoppingList);

        $shoppingList->delete();

        return back(200)->with('message', __('custom.global.messages.successfully_delete'));
    }
}
