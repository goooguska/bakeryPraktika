<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Http\Resources\IngredientCollection;
use App\Http\Resources\IngredientResource;

class IngredientController extends Controller
{
   
    public function index()
    {
        $ingredients = Ingredient::all();
        return new IngredientCollection($ingredients);
    }
    public function store(StoreIngredientRequest $request)
    {
        $data = $request->validated();
        $ingredient = Ingredient::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('ingredients.show', [
                'ingredient' => $ingredient->id,
            ]),
        ]);
    }
    public function show(Ingredient $ingredient)
    {
        return new IngredientResource($ingredient);
    }
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();
        $ingredient->update($data);
        return response()->noContent(204);
    }
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response()->noContent(204);
    }
}
