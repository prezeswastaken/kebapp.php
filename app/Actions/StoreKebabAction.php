<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\KebabDTO;
use App\Models\Kebab;

class StoreKebabAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected StoreLogoAction $storeLogoAction,
    ) {}

    public function handle(KebabDTO $kebabDTO): Kebab
    {
        /** @var Kebab $result */
        $result = Kebab::create($kebabDTO->toCreateData());

        if (isset($kebabDTO->logo)) {
            $this->storeLogoAction->handle($result, $kebabDTO->logo);
        }

        $result->refresh();

        // $kebab->meatTypes()->attach($kebabDTO->meatTypes);
        // $kebab->sauces()->attach($kebabDTO->sauces);

        return $result;
    }
}
