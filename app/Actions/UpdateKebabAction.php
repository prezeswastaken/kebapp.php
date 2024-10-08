<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\KebabDTO;
use App\Models\Kebab;

class UpdateKebabAction
{
    public function handle(KebabDTO $kebabDTO, int $kebabId): Kebab
    {
        $result = Kebab::findOrFail($kebabId)->update($kebabDTO->toCreateData());

        $result = Kebab::findOrFail($kebabId);

        $result->meatTypes()->sync($kebabDTO->meatTypeIds);
        $result->sauces()->sync($kebabDTO->sauceIds);
        $result->load(['meatTypes', 'sauces']);

        return $result;
    }
}
