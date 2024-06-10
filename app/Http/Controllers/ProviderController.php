<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Http\Resources\ProviderCollection;
use App\Http\Resources\ProviderResource;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return new ProviderCollection($providers);
    }
    public function store(StoreProviderRequest $request)
    {
        $data = $request->validated();
        $provider = Provider::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('providers.show', [
                'provider' => $provider->id,
            ]),
        ]);
    }
    public function show(Provider $provider)
    {
        return new ProviderResource($provider);
    }
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $data = $request->validated();
        $provider->update($data);
        return response()->noContent(204);
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return response()->noContent(204);
    }
}
