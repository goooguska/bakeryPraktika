<?php

namespace App\Http\Controllers;

use App\Models\BakedProduct;
use App\Http\Requests\StoreBakedProductRequest;
use App\Http\Requests\UpdateBakedProductRequest;
use App\Http\Resources\BakedProductCollection;
use App\Http\Resources\BakedProductResource;

class BakedProductController extends Controller
{
    public function index()
    {
        $bakedProducts = BakedProduct::all();
        return new BakedProductCollection($bakedProducts);
    }
    public function store(StoreBakedProductRequest $request)
    {
        $data = $request->validated();
        $bakedProduct = BakedProduct::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('bakedProducts.show', [
                'bakedProduct' => $bakedProduct->id,
            ]),
        ]);
    }
    public function show(BakedProduct $bakedProduct)
    {
        return new BakedProductResource($bakedProduct);
    }
    public function update(UpdateBakedProductRequest $request, BakedProduct $bakedProduct)
    {
        $data = $request->validated();
        $bakedProduct->update($data);
        return response()->noContent(204);
    }
    public function destroy(BakedProduct $bakedProduct)
    {
        $bakedProduct->delete();
        return response()->noContent(204);
    }
}
