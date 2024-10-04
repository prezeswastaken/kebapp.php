<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreKebabAction;
use App\Actions\StoreOpeningHoursAction;
use App\DTOs\KebabDTO;
use App\DTOs\OpeningHoursDTO;
use App\Http\Resources\KebabResource;
use App\Models\Kebab;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KebabController extends Controller
{
    public function paginated(Request $request)
    {
        $perPage = $request->get('perPage', 10);

        return KebabResource::collection(Kebab::with('openingHours')->orderBy('id', 'desc')->paginate($perPage));
    }

    public function index()
    {
        return KebabResource::collection(Kebab::with('openingHours')->orderBy('id', 'desc')->get());
    }

    public function store(Request $request, StoreKebabAction $action, StoreOpeningHoursAction $storeOpeningHoursAction): JsonResponse
    {
        return response()->json($request->all());
        $kebabDTO = KebabDTO::fromRequest($request);
        $result = $action->handle($kebabDTO);

        $openingHoursDTO = OpeningHoursDTO::make($request->all(), $result->id);
        $storeOpeningHoursAction->handle($openingHoursDTO);
        $result->load('openingHours');

        return response()->json(KebabResource::make($result), 201);
    }

    public function show(Kebab $kebab)
    {
        $kebab->load('openingHours');

        return response()->json(KebabResource::make($kebab));
    }

    public function update(Request $request, Kebab $kebab)
    {
        //
    }

    public function destroy(Kebab $kebab)
    {
        $kebab->delete();

        return response()->json(null, 204);
    }
}
