<?php

namespace App\Http\Controllers;

use App\Models\BakedProduct;
use App\Http\Requests\StoreBakedProductRequest;
use App\Http\Requests\UpdateBakedProductRequest;

class BakedProductController extends Controller
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
    public function store(StoreBakedProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BakedProduct $bakedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBakedProductRequest $request, BakedProduct $bakedProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BakedProduct $bakedProduct)
    {
        //
    }
}
