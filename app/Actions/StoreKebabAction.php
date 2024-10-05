<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\KebabDTO;
use App\Models\Kebab;

class StoreKebabAction
{
    public function handle(KebabDTO $kebabDTO): Kebab
    {
        /** @var Kebab $result */
        $result = Kebab::create($kebabDTO->toCreateData());

        $result->refresh();

        // $kebab->meatTypes()->attach($kebabDTO->meatTypes);
        // $kebab->sauces()->attach($kebabDTO->sauces);

        return $result;
    }
}
