<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Kebab;
use Illuminate\Support\Collection;

class UpdateGlovoRatesForAllKebabs
{
    public function __construct(
        private FetchGlovoRatesForKebab $fetchGlovoRatesForKebab,
    ) {}

    public function handle()
    {
        /** @var Collection $kebabs */
        $kebabs = Kebab::whereNotNull('glovo_url')->get();
        $kebabs->each(function ($kebab) {
            $rate = $this->fetchGlovoRatesForKebab->handle($kebab->glovo_url);
            if ($rate !== 0) {
                $kebab->update(['glovo_rates' => $rate]);
            }
        });
    }
}
