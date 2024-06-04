<?php

namespace App\Http\Controllers;

use App\Models\Baker;
use App\Http\Requests\StoreBakerRequest;
use App\Http\Requests\UpdateBakerRequest;

class BakerController extends Controller
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
    public function store(StoreBakerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Baker $baker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBakerRequest $request, Baker $baker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Baker $baker)
    {
        //
    }
}
