<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeatTypeRequest;
use App\Http\Resources\MeatTypeResource;
use App\Models\MeatType;

class MeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MeatTypeResource::collection(MeatType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeatTypeRequest $request)
    {
        $result = MeatType::create($request->validated());

        return response()->json(MeatTypeResource::make($result), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MeatType $meatType)
    {
        return MeatTypeResource::make($meatType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MeatTypeRequest $request, MeatType $meatType)
    {
        $meatType->update($request->validated());
        $meatType->refresh();

        return response()->json(MeatTypeResource::make($meatType));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeatType $meatType)
    {
        $meatType->delete();

        return response()->json(null, 204);
    }
}
