<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class FavouriteController extends Controller
{
    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function addProductToFavourites(Product $product): RedirectResponse
    {
        auth()->user()->favourites()->attach($product);

        return back()->with('message', __('custom.global.messages.successfully_favourite'));
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function removeProductFromFavourites(Product $product): RedirectResponse
    {
        auth()->user()->favourites()->detach($product);

        return back()->with('message', __('custom.global.messages.successfully_remove_favourite'));
    }
}
