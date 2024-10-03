<?php

declare(strict_types=1);

namespace App\Actions;

use App\KebabDTO;
use App\Models\Kebab;

class StoreKebabAction
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function handle(KebabDTO $kebabDTO): Kebab
    {
        /** @var Kebab $result */
        $result = Kebab::create($kebabDTO->toCreateData());

        // $kebab->meatTypes()->attach($kebabDTO->meatTypes);
        // $kebab->sauces()->attach($kebabDTO->sauces);

        return $result;
    }
}
