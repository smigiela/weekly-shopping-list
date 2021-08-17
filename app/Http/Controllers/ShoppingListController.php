<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingListRequest;
use App\Models\ShoppingList;

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
     * Use observer to add auth user to pivot tabel
     */
    public function store(StoreShoppingListRequest $request)
    {
        ShoppingList::create($request->validated());

        return back(201)->with('message', __('custom.global.messages.successfull_save'));
    }

    public function show(ShoppingList $shoppingList)
    {
        if (! $shoppingList->users->contains(auth()->user())){
            abort(401, __('custom.global.messages.dont_have_permission'));
        }

        return view('shopping_lists.show', compact('shoppingList'));
    }

    public function edit(ShoppingList $shoppingList)
    {
        if (! $shoppingList->users->contains(auth()->user())){
            abort(401, __('custom.global.messages.dont_have_permission'));
        }

        return view('shopping_lists.edit', compact('shoppingList'));
    }

    public function update(ShoppingList $shoppingList, StoreShoppingListRequest $request)
    {
        if (! $shoppingList->users->contains(auth()->user())){
            abort(401, __('custom.global.messages.dont_have_permission'));
        }

        $shoppingList->update($request->validated());
    }

    public function destroy(ShoppingList $shoppingList)
    {
        if (! $shoppingList->users->contains(auth()->user())){
            abort(401, __('custom.global.messages.dont_have_permission'));
        }

        $shoppingList->delete();
    }
}
