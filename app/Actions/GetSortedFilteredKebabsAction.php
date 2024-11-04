<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Kebab;
use App\SortingOrder;
use App\ValueObjects\KebabFilterParams;
use App\ValueObjects\KebabSortParams;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class GetSortedFilteredKebabsAction
{
    public function __construct() {}

    public function handle(KebabFilterParams $filterParams, KebabSortParams $sortingParams): Builder
    {
        return Kebab::with(['openingHours', 'meatTypes', 'sauces', 'likes', 'comments.user'])
            ->when($filterParams->meatTypes, function (Builder $query, array $meatTypes) {
                $query->whereRelation('meatTypes', function ($q) use ($meatTypes) {
                    $q->whereIn('name', $meatTypes);
                });
            })
            ->when($filterParams->sauces, function (Builder $query, array $sauces) {
                $query->whereRelation('sauces', function ($q) use ($sauces) {
                    $q->whereIn('name', $sauces);
                });
            })
            ->when($filterParams->statuses, function (Builder $query, array $statuses) {
                $query->whereIn('status', $statuses);
            })
            ->when(isset($filterParams->isKraft), function (Builder $query) use ($filterParams) {
                $query->where('is_kraft', $filterParams->isKraft);
            })
            ->when(isset($filterParams->isFoodTruck), function (Builder $query) use ($filterParams) {
                $query->where('is_food_truck', $filterParams->isFoodTruck);
            })
            ->when(isset($filterParams->hasGlovo), function (Builder $query) use ($filterParams) {
                $query->where('has_glovo', $filterParams->hasGlovo);
            })
            ->when(isset($filterParams->hasPyszne), function (Builder $query) use ($filterParams) {
                $query->where('has_pyszne', $filterParams->hasPyszne);
            })
            ->when(isset($filterParams->hasUberEats), function (Builder $query) use ($filterParams) {
                $query->where('has_ubereats', $filterParams->hasUberEats);
            })
            ->when(isset($filterParams->hasPhone), function (Builder $query) use ($filterParams) {
                $filterParams->hasPhone ? $query->whereNotNull('phone_number') : $query->whereNull('phone_number');
            })
            ->when(isset($filterParams->hasWebsite), function (Builder $query) use ($filterParams) {
                $filterParams->hasWebsite ? $query->whereNotNull('website_link') : $query->whereNull('website_link');
            })
            ->when(isset($filterParams->hasNetwork), function (Builder $query) use ($filterParams) {
                $filterParams->hasNetwork ? $query->whereNotNull('network') : $query->whereNull('network');
            })
            ->when(isset($filterParams->isOpenNow), function (Builder $query) use ($filterParams) {
                $currentTime = Carbon::now('Europe/Warsaw');
                $currentWeekDay = strtolower($currentTime->format('l'));

                if ($filterParams->isOpenNow) {
                    $query->whereHas('openingHours', function (Builder $query) use ($currentWeekDay, $currentTime) {
                        $query->where('week_day', $currentWeekDay)
                            ->whereTime('opens_at', '<=', $currentTime->toTimeString())
                            ->whereTime('closes_at', '>', $currentTime->toTimeString());
                    });
                } else {
                    $query->whereDoesntHave('openingHours', function (Builder $query) use ($currentWeekDay, $currentTime) {
                        $query->where('week_day', $currentWeekDay)
                            ->whereTime('opens_at', '<=', $currentTime->toTimeString())
                            ->whereTime('closes_at', '>', $currentTime->toTimeString());
                    });
                }
            })
            ->when(isset($sortingParams->order), function (Builder $query) use ($sortingParams) {
                $field = $sortingParams->field;
                if ($sortingParams->order == SortingOrder::Ascending) {
                    $query->orderBy($field);
                } else {
                    $query->orderByDesc($field);
                }
            });
    }
}
