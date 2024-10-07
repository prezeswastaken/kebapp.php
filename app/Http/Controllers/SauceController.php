<?php

namespace App\Http\Controllers;

use App\DTOs\SauceDTO;
use App\Http\Requests\SauceRequest;
use App\Http\Resources\SauceResource;
use App\Models\Sauce;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SauceResource::collection(Sauce::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SauceRequest $request)
    {
        $result = Sauce::create(SauceDTO::fromRequest($request)->toCreateArray());

        return response()->json(SauceResource::make($result), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sauce $sauce)
    {
        return SauceResource::make($sauce);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SauceRequest $request, Sauce $sauce)
    {
        $sauce->update(SauceDTO::fromRequest($request)->toCreateArray());
        $sauce->refresh();

        return response()->json(SauceResource::make($sauce));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sauce $sauce)
    {
        $sauce->delete();

        return response()->json(null, 204);
    }
}
