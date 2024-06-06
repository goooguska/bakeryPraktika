<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\RecipeResource;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return new RecipeCollection($recipes);
    }
    public function store(StoreRecipeRequest $request)
    {
        $data = $request->validated();
        $recipe = Recipe::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('recipes.show', [
                'news' => $recipe->id,
            ]),
        ]);
    }

    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);

    }
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $data = $request->validated();
        $recipe->update($data);
        return response()->noContent(204);
    }
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return response()->noContent(204);
    }
}
