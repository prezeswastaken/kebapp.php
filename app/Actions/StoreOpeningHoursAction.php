<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\OpeningHoursDTO;
use App\Models\OpeningHoursDay;

class StoreOpeningHoursAction
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function handle(OpeningHoursDTO $openingHoursDTO): void
    {
        $data = $openingHoursDTO->toCreateArray();

        OpeningHoursDay::insert($data);
    }
}
