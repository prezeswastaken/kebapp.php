<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Kebab;
use Illuminate\Support\Collection;

class UpdateGoogleRatesForAllKebabs
{
    public function __construct(
        private FetchGoogleRatesForKebab $fetchGoogleRatesForKebab,
    ) {}

    public function handle()
    {
        /** @var Collection $kebabs */
        $kebabs = Kebab::all();
        $kebabs->each(function ($kebab) {
            $rate = $this->fetchGoogleRatesForKebab->handle($kebab->name);
            if ($rate !== 0) {
                $kebab->update(['google_rates' => $rate]);
            }
        });
    }
}
