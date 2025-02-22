<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\GetSortedFilteredKebabsAction;
use App\Actions\StoreKebabAction;
use App\Actions\StoreOpeningHoursAction;
use App\Actions\UpdateKebabAction;
use App\DTOs\KebabDTO;
use App\DTOs\OpeningHoursDTO;
use App\Http\Requests\StoreKebabRequest;
use App\Http\Resources\KebabResource;
use App\Models\AdminLog;
use App\Models\Kebab;
use App\Models\User;
use App\ValueObjects\KebabFilterParams;
use App\ValueObjects\KebabSortParams;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KebabController extends Controller
{
    public function paginated(Request $request, GetSortedFilteredKebabsAction $action)
    {
        $perPage = $request->get('perPage', 10);

        $filterParams = KebabFilterParams::fromRequest($request);
        $sortingParams = KebabSortParams::fromRequest($request);

        return KebabResource::collection(
            $action->handle($filterParams, $sortingParams)->paginate($perPage)
        );
    }

    public function index(Request $request, GetSortedFilteredKebabsAction $action)
    {
        $filterParams = KebabFilterParams::fromRequest($request);
        $sortingParams = KebabSortParams::fromRequest($request);

        return KebabResource::collection(
            $action->handle($filterParams, $sortingParams)->get()
        );
    }

    public function store(
        StoreKebabRequest $request,
        StoreKebabAction $action,
        StoreOpeningHoursAction $storeOpeningHoursAction,
        #[CurrentUser] User $user,
    ): JsonResponse {
        $kebabDTO = KebabDTO::fromRequest($request);
        $result = $action->handle($kebabDTO);

        $openingHoursDTO = OpeningHoursDTO::make($request->all(), $result->id);
        $storeOpeningHoursAction->handle($openingHoursDTO);
        $result->load('openingHours');

        AdminLog::create([
            'user_name' => $user->name,
            'method' => 'POST',
            'action_name' => "Added kebab $result->name",
        ]);

        return response()->json(KebabResource::make($result), 201);
    }

    public function show(Kebab $kebab)
    {
        $kebab->load(['openingHours', 'meatTypes', 'sauces', 'likes', 'comments.user']);

        return response()->json(KebabResource::make($kebab));
    }

    public function update(
        StoreKebabRequest $request,
        Kebab $kebab,
        UpdateKebabAction $updateKebabAction,
        StoreOpeningHoursAction $storeOpeningHoursAction,
    ) {
        $result = $updateKebabAction->handle(KebabDTO::fromRequest($request), $kebab->id);

        $kebab->openingHours()->delete();
        $openingHoursDTO = OpeningHoursDTO::make($request->all(), $result->id);
        $storeOpeningHoursAction->handle($openingHoursDTO);
        $result->load('openingHours');

        AdminLog::create([
            'user_name' => $request->user()->name,
            'method' => 'PUT',
            'action_name' => "Updated kebab $result->name",
        ]);

        return response()->json(KebabResource::make($result));
    }

    public function destroy(Kebab $kebab, #[CurrentUser] User $user)
    {
        $kebab->delete();

        AdminLog::create([
            'user_name' => $user->name,
            'method' => 'DELETE',
            'action_name' => "Deleted kebab $kebab->name",
        ]);

        return response()->json(null, 204);
    }
}
