<?php

namespace App\Http\Controllers;

use App\Models\RecipeIngredient;
use App\Http\Requests\StoreRecipeIngredientRequest;
use App\Http\Requests\UpdateRecipeIngredientRequest;
use App\Http\Resources\RecipeIngredientCollection;
use App\Http\Resources\RecipeIngredientResource;

class RecipeIngredientController extends Controller
{
    public function index()
    {
        $recipeIngredients = RecipeIngredient::all();
        return new RecipeIngredientCollection($recipeIngredients);
    }
    public function store(StoreRecipeIngredientRequest $request)
    {
        $data = $request->validated();
        $recipeIngredient = RecipeIngredient::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('recipeIngredients.show', [
                'recipeIngredient' => $recipeIngredient->id,
            ]),
        ]);
    }
    public function show(RecipeIngredient $recipeIngredient)
    {
        return new RecipeIngredientResource($recipeIngredient);

    }
    public function update(UpdateRecipeIngredientRequest $request, RecipeIngredient $recipeIngredient)
    {
        $data = $request->validated();
        $recipeIngredient->update($data);
        return response()->noContent(204);
    }
    public function destroy(RecipeIngredient $recipeIngredient)
    {
        $recipeIngredient->delete();
        return response()->noContent(204);
    }
}
