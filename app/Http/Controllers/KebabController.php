<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreKebabAction;
use App\Http\Requests\StoreKebabRequest;
use App\KebabDTO;
use App\Models\Kebab;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KebabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Kebab::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKebabRequest $request, StoreKebabAction $action): JsonResponse
    {
        $kebabDTO = KebabDTO::fromRequest($request);
        $result = $action->handle($kebabDTO);

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kebab $kebab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kebab $kebab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kebab $kebab)
    {
        //
    }
}
