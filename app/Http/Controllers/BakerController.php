<?php

namespace App\Http\Controllers;

use App\Models\Baker;
use App\Http\Requests\StoreBakerRequest;
use App\Http\Requests\UpdateBakerRequest;
use App\Http\Resources\BakerCollection;
use App\Http\Resources\BakerResource;

class BakerController extends Controller
{

    public function index()
    {
        $bakers = Baker::all();
        return new BakerCollection($bakers);
    }
    public function store(StoreBakerRequest $request)
    {
        $data = $request->validated();
        $baker = Baker::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('bakers.show', [
                'baker' => $baker->id,
            ]),
        ]);
    }
    public function show(Baker $baker)
    {
        return new BakerResource($baker);
    }
    public function update(UpdateBakerRequest $request, Baker $baker)
    {
        $data = $request->validated();
        $baker->update($data);
        return response()->noContent(204);
    }
    public function destroy(Baker $baker)
    {
        $baker->delete();
        return response()->noContent(204);
    }
}
