<?php

namespace App\Http\Controllers\Shopping_lists;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Product;
use App\Models\Shopping_lists\Position;
use App\Models\Shopping_lists\ShoppingList;

class PositionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StorePositionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(StorePositionRequest $request, ShoppingList $shoppingList)
    {
        ShoppingList::check_permission($shoppingList);

        $productCategoryId = Product::where('name', $request->name1)->pluck('product_category_id')->first();

        if (! $productCategoryId){
            $productCategoryId = 11;
        }

        $existPosition = Position::where([
            'name' => $request->name,
            'shopping_list_id' => $shoppingList->id,
            'type' => $request->type,
            'is_done' => null])
            ->first();

        if ($existPosition) {
            $existPosition->update(['amount' => ($existPosition->amount + $request->amount)]);
        } else {
            Position::create([
                'name' => $request->validated()['name'],
                'amount' => $request->validated()['amount'],
                'type' => $request->validated()['type'],
                'shopping_list_id' => $shoppingList->id,
                'product_category_id' => $productCategoryId
                ]);
        }

        return back(201)->with('message', __('custom.global.messages.successfully_save'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Position $position)
    {
        Position::check_permission($position);

        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePositionRequest $request
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        Position::check_permission($position);

        $position->update($request->validated());

        return back()->with('message', __('custom.global.messages.successfully_save'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Position $position)
    {
        Position::check_permission($position);

        $position->delete();

        return back()
            ->with(
                'message',
                __('custom.global.messages.successfully_delete')
                . '<a href="'.route('positions.restore', $position->id).'" class="text-red-500 ml-2 md:ml-12">
                    <strong>Ups! Cofnij!</strong>
                    </a>');
    }

    public function restore($position_id)
    {
        $position = Position::withTrashed()->findOrFail($position_id);
        if ($position && $position->trashed()) {
            $position->restore();
        }

        return back()->with('message', __('custom.global.messages.successfully_restore'));
    }
}
