<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Models\Recipes\Recipe;
use App\Models\Recipes\RecipeItem;
use Illuminate\Http\Request;

class RecipeItemController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $recipe->recipeItems()->create($request->all());

        return back()->with(__('custom.global.messages.successfully_save'));
    }
}
