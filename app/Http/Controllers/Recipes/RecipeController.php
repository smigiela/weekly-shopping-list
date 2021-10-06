<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Models\Recipes\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $myRecipes = Recipe::withCount('recipeItems')->where('user_id', auth()->id())
            ->paginate(10);

        $teamRecipes = Recipe::withCount('recipeItems')->where('team_id', auth()->user()->currentTeam->id)
            ->paginate(10);

        $publicRecipes = Recipe::withCount('recipeItems')->where('is_public', true)
            ->paginate(10);

        return view('recipes.index', compact('myRecipes', 'teamRecipes', 'publicRecipes'));
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

        if ($request->hasFile('image')) {
            $recipe->addMediaFromRequest('image')->toMediaCollection('recipe_cover');
        }

        return redirect()->route('recipes.edit', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        if (! auth()->user()->subscribed('premium')){
            abort(401, __('custom.global.messages.dont_have_active_subscription'));
        }

        $recipe->load('recipeItems');

        return view('recipes.edit', compact('recipe'));
    }

    public function show(Recipe $recipe)
    {
        $recipe->load('recipeItems');

        return view('recipes.show', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        if (! auth()->user()->subscribed('premium')){
            abort(401, __('custom.global.messages.dont_have_active_subscription'));
        }

        Recipe::update($request->all());

        if ($request->hasFile('image')) {
            $recipe->addMediaFromRequest('image')->toMediaCollection('recipe_cover');
        }

        return redirect()->route('recipes.edit')->with('message', __('custom.global.messages.successfully_save'));
    }

    public function share_to_team(Recipe $recipe)
    {
        try {
            if ($recipe->team_id == 0) {
                $recipe->update(['team_id' => auth()->user()->currentTeam->id]);
            } else {
                $recipe->update(['team_id' => null]);
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('recipes.index')
            ->with('message', __('custom.global.messages.successfully_save'));
    }

    public function share_to_public(Recipe $recipe)
    {
        try {
            if ($recipe->is_public == 0) {
                $recipe->update(['is_public' => true]);
            } else {
                $recipe->update(['is_public' => false]);
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('recipes.index')
            ->with('message', __('custom.global.messages.successfully_save'));
    }
}
