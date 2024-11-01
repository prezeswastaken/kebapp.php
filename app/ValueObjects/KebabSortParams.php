<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\SortingOrder;
use Illuminate\Http\Request;

class KebabSortParams
{
    public function __construct(
        public readonly ?string $field,
        public readonly ?SortingOrder $order,
    ) {}

    public static function fromRequest(Request $request)
    {
        $allowedFields = ['name', 'openingYear', 'closingYear'];
        $fieldMap = [
            'name' => 'name',
            'openingYear' => 'opening_year',
            'closingYear' => 'closing_year',
        ];

        if ($request->has('orderBy')) {
            $order = SortingOrder::Ascending;
            $field = $request->input('orderBy');
        } elseif ($request->has('orderByDesc')) {
            $order = SortingOrder::Descending;
            $field = $request->input('orderByDesc');
        } else {
            return new self(
                field: null,
                order: null,
            );
        }

        if (! in_array($field, $allowedFields)) {
            return new self(
                field: null,
                order: null,
            );
        }

        $field = $fieldMap[$field];

        return new self(
            field: $field,
            order: $order,
        );
    }
}
