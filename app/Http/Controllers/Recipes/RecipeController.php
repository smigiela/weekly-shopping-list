<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Models\Recipes\Product;
use App\Models\Recipes\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index');
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        if (! auth()->user()->subscribed('premium')){
            abort(401, __('custom.global.messages.dont_have_active_subscription'));
        }

        $recipe = Recipe::create($request->all() + ['user_id' => auth()->id()]);

        return redirect()->route('recipes.show', compact('recipe'));
    }

    public function show(Recipe $recipe)
    {
        //TODO: dodać zapisywanie zdjęcia
        
        $products = Product::all();
        $recipe->load('recipeItems');

        return view('recipes.show', compact('recipe', 'products'));
    }

}
