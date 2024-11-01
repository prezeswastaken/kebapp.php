<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\SortingOrder;
use Illuminate\Http\Request;

class KebabSortParams
{
    public function __construct(
        public readonly ?string $table,
        public readonly ?SortingOrder $order,
    ) {}

    public static function fromRequest(Request $request)
    {
        if ($request->has('orderBy')) {
            return new self(
                table: $request->input('orderBy'),
                order: SortingOrder::Ascending,
            );
        } elseif ($request->has('orderByDesc')) {
            return new self(
                table: $request->input('orderByDesc'),
                order: SortingOrder::Descending,
            );
        } else {
            return new self(
                table: null,
                order: null,
            );
        }
    }
}
