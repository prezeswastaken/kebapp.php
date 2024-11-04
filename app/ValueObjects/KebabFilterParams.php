<?php

declare(strict_types=1);

namespace App\ValueObjects;

use Illuminate\Http\Request;

class KebabFilterParams
{
    public readonly ?bool $isKraft;

    public readonly ?bool $isFoodTruck;

    public readonly ?bool $hasGlovo;

    public readonly ?bool $hasPyszne;

    public readonly ?bool $hasUberEats;

    public readonly ?bool $hasPhone;

    public readonly ?bool $hasWebsite;

    public readonly ?bool $hasNetwork;

    public readonly ?bool $isOpenNow;

    private function __construct(
        public readonly ?array $meatTypes,
        public readonly ?array $sauces,
        public readonly ?array $statuses,
        ?string $isKraft,
        ?string $isFoodTruck,
        ?string $hasGlovo,
        ?string $hasPyszne,
        ?string $hasUberEats,
        ?string $hasPhone,
        ?string $hasWebsite,
        ?string $hasNetwork,
        ?string $isOpenNow,
    ) {
        $this->isKraft = $this->parseBool($isKraft);
        $this->isFoodTruck = $this->parseBool($isFoodTruck);
        $this->hasGlovo = $this->parseBool($hasGlovo);
        $this->hasPyszne = $this->parseBool($hasPyszne);
        $this->hasUberEats = $this->parseBool($hasUberEats);
        $this->hasPhone = $this->parseBool($hasPhone);
        $this->hasWebsite = $this->parseBool($hasWebsite);
        $this->hasNetwork = $this->parseBool($hasNetwork);
        $this->isOpenNow = $this->parseBool($isOpenNow);
    }

    public static function fromRequest(Request $request)
    {
        return new self(
            meatTypes: $request->has('meatTypes') ? explode(',', $request->get('meatTypes')) : null,
            sauces: $request->has('sauces') ? explode(',', $request->get('sauces')) : null,
            statuses: $request->has('statuses') ? explode(',', $request->get('statuses')) : null,
            isKraft: $request->get('isKraft'),
            isFoodTruck: $request->get('isFoodTruck'),
            hasGlovo: $request->get('hasGlovo'),
            hasPyszne: $request->get('hasPyszne'),
            hasUberEats: $request->get('hasUberEats'),
            hasPhone: $request->get('hasPhone'),
            hasWebsite: $request->get('hasWebsite'),
            hasNetwork: $request->get('hasNetwork'),
            isOpenNow: $request->get('isOpenNow'),
        );
    }

    private function parseBool(?string $string): ?bool
    {
        if (! isset($string)) {
            return null;
        }
        $positive = ['true',  '1'];
        $negative = ['false', '2'];
        if (in_array($string, $positive)) {
            return true;
        } elseif (in_array($string, $negative)) {
            return false;
        } else {
            return null;
        }
    }
}
