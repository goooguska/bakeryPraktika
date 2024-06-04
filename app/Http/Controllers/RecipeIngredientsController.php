<?php

namespace App\Http\Controllers;

use App\Models\RecipeIngredients;
use App\Http\Requests\StoreRecipeIngredientsRequest;
use App\Http\Requests\UpdateRecipeIngredientsRequest;

class RecipeIngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeIngredientsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RecipeIngredients $recipeIngredients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeIngredientsRequest $request, RecipeIngredients $recipeIngredients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecipeIngredients $recipeIngredients)
    {
        //
    }
}
