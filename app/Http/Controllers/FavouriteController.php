<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::all();

        return view('products.favourites.index', compact('products'));
    }

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
