<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Resources\SaleCollection;
use App\Http\Resources\SaleResource;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::all();
        return new SaleCollection($sales);
    }

    public function store(StoreSaleRequest $request)
    {
        $data = $request->validated();
        $sale = Sale::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('sales.show', [
                'sale' => $sale->id,
            ]),
        ]);
    }

    public function show(Sale $sale)
    {
        return new SaleResource($sale);
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $data = $request->validated();
        $sale->update($data);
        return response()->noContent(204);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return response()->noContent(204);
    }
}
