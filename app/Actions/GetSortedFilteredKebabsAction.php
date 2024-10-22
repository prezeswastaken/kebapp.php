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
            ->orderBy('id', 'desc');
    }
}
