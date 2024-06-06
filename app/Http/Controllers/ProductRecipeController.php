<?php

namespace App\Http\Controllers;

use App\Models\ProductRecipe;
use App\Http\Requests\StoreProductRecipeRequest;
use App\Http\Requests\UpdateProductRecipeRequest;
use App\Http\Resources\ProductRecipeCollection;
use App\Http\Resources\ProductRecipeResource;

class ProductRecipeController extends Controller
{
    public function index()
    {
        $productRecipes = ProductRecipe::all();
        return new ProductRecipeCollection($productRecipes);
    }
    public function store(StoreProductRecipeRequest $request)
    {
        $data = $request->validated();
        $productRecipe = ProductRecipe::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('productRecipes.show', [
                'productRecipe' => $productRecipe->id,
            ]),
        ]);
    }
    public function show(ProductRecipe $productRecipe)
    {
        return new ProductRecipeResource($productRecipe);
    }
    public function update(UpdateProductRecipeRequest $request, ProductRecipe $productRecipe)
    {
        $data = $request->validated();
        $productRecipe->update($data);
        return response()->noContent(204);
    }
    public function destroy(ProductRecipe $productRecipe)
    {
        $productRecipe->delete();
        return response()->noContent(204);
    }
}
