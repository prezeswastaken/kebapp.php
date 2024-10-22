<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Kebab;
use App\ValueObjects\KebabSortFilterParams;
use Illuminate\Database\Eloquent\Builder;

class GetSortedFilteredKebabsAction
{
    public function __construct() {}

    public function handle(KebabSortFilterParams $params): Builder
    {
        return Kebab::with(['openingHours', 'meatTypes', 'sauces', 'likes'])
            ->when($params->meatTypes, function (Builder $query, array $meatTypes) {
                $query->whereRelation('meatTypes', function ($q) use ($meatTypes) {
                    $q->whereIn('name', $meatTypes);
                });
            })
            ->when($params->sauces, function (Builder $query, array $sauces) {
                $query->whereRelation('sauces', function ($q) use ($sauces) {
                    $q->whereIn('name', $sauces);
                });
            })
            ->when($params->statuses, function (Builder $query, array $statuses) {
                $query->whereIn('status', $statuses);
            })
            ->when(isset($params->isKraft), function (Builder $query) use ($params) {
                $query->where('is_kraft', $params->isKraft);
            })
            ->when(isset($params->isFoodTruck), function (Builder $query) use ($params) {
                $query->where('is_food_truck', $params->isFoodTruck);
            })
            ->when(isset($params->hasGlovo), function (Builder $query) use ($params) {
                $query->where('has_glovo', $params->hasGlovo);
            })
            ->when(isset($params->hasPyszne), function (Builder $query) use ($params) {
                $query->where('has_pyszne', $params->hasPyszne);
            })
            ->when(isset($params->hasUberEats), function (Builder $query) use ($params) {
                $query->where('has_ubereats', $params->hasUberEats);
            })
            ->when(isset($params->hasPhone), function (Builder $query) use ($params) {
                $params->hasPhone ? $query->whereNotNull('phone_number') : $query->whereNull('phone_number');
            })
            ->when(isset($params->hasWebsite), function (Builder $query) use ($params) {
                $params->hasWebsite ? $query->whereNotNull('website_link') : $query->whereNull('website_link');
            })
            ->when(isset($params->hasNetwork), function (Builder $query) use ($params) {
                $params->hasNetwork ? $query->whereNotNull('network') : $query->whereNull('network');
            })
            ->orderBy('id', 'desc');
    }
}
