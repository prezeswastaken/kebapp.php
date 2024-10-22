<?php

declare(strict_types=1);

namespace App\ValueObjects;

use Illuminate\Http\Request;

class KebabSortFilterParams
{
    private function __construct(
        public readonly ?array $meatTypes,
        public readonly ?array $sauces,
    ) {}

    public static function fromRequest(Request $request)
    {
        return new self(
            meatTypes: $request->has('meatTypes') ? explode(',', $request->get('meatTypes')) : null,
            sauces: $request->has('sauces') ? explode(',', $request->get('sauces')) : null,
        );
    }
}
