<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Recipes\Recipe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index()
    {
        if (! auth()->user()->subscribed('premium')){
            abort(401, __('custom.global.messages.dont_have_active_subscription'));
        }

        $myRecipes = Recipe::withCount('recipeItems')->where('user_id', auth()->id())
            ->paginate(10);

        $teamRecipes = Recipe::withCount('recipeItems')->where('team_id', auth()->user()->currentTeam->id)
            ->paginate(10);

        $publicRecipes = Recipe::withCount('recipeItems')->where('is_public', true)
            ->paginate(10);

        return view('recipes.index', compact('myRecipes', 'teamRecipes', 'publicRecipes'));
    }

    /**
     * @return View
     */
    public function create(): View
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

        Recipe::check_permission($recipe);

        $recipe->load('recipeItems');

        $categories = ProductCategory::all();

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function show(Recipe $recipe)
    {
        Recipe::check_permission($recipe);

        $recipe->load('recipeItems');

        return view('recipes.show', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        if (! auth()->user()->subscribed('premium')){
            abort(401, __('custom.global.messages.dont_have_active_subscription'));
        }

        Recipe::check_permission($recipe);

        Recipe::update($request->all());

        if ($request->hasFile('image')) {
            $recipe->addMediaFromRequest('image')->toMediaCollection('recipe_cover');
        }

        return redirect()->route('recipes.edit')->with('message', __('custom.global.messages.successfully_save'));
    }

    public function share_to_team(Recipe $recipe)
    {
        Recipe::check_permission($recipe);

        try {
            if ($recipe->team_id == 0) {
                $recipe->update(['team_id' => auth()->user()->currentTeam->id]);
            } else {
                $recipe->update(['team_id' => null]);
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return back()
            ->with('message', __('custom.global.messages.successfully_save'));
    }

    public function share_to_public(Recipe $recipe)
    {
        Recipe::check_permission($recipe);

        try {
            if ($recipe->is_public == 0) {
                $recipe->update(['is_public' => true]);
            } else {
                $recipe->update(['is_public' => false]);
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return back()
            ->with('message', __('custom.global.messages.successfully_save'));
    }
}
