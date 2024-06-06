<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return new ProductCollection($products);
    }
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('products.show', [
                'product' => $product->id,
            ]),
        ]);
    }
    public function show(Product $product)
    {
        return new ProductResource($product);
        
    }
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        return response()->noContent(204);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent(204);
    }
}
