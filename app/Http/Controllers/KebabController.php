<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreKebabAction;
use App\Actions\StoreOpeningHoursAction;
use App\DTOs\KebabDTO;
use App\DTOs\OpeningHoursDTO;
use App\Http\Requests\StoreKebabRequest;
use App\Http\Resources\KebabResource;
use App\Models\Kebab;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KebabController extends Controller
{
    public function paginated()
    {
        $perPage = request()->get('perPage', 10);

        return KebabResource::collection(Kebab::with('openingHours')->orderBy('id', 'desc')->paginate($perPage));
    }

    public function index()
    {
        return KebabResource::collection(Kebab::with('openingHours')->orderBy('id', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKebabRequest $request, StoreKebabAction $action, StoreOpeningHoursAction $storeOpeningHoursAction): JsonResponse
    {
        $kebabDTO = KebabDTO::fromRequest($request);
        $result = $action->handle($kebabDTO);

        $openingHoursDTO = OpeningHoursDTO::make($request->all(), $result->id);
        $storeOpeningHoursAction->handle($openingHoursDTO);

        return response()->json(KebabResource::make($result), 201);
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
