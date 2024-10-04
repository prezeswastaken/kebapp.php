<?php

declare(strict_types=1);

namespace App\DTOs;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class KebabDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?UploadedFile $logo,
        public readonly string $address,
        public readonly float|string $coordinatesX,
        public readonly float|string $coordinatesY,
        public readonly int|string|null $openingYear,
        public readonly int|string|null $closingYear,
        public readonly string $status,
        public readonly bool $isKraft,
        public readonly bool $isFoodTruck,
        public readonly ?string $network,
        public readonly ?string $appLink,
        public readonly ?string $websiteLink,
        public readonly bool $hasGlovo,
        public readonly bool $hasPyszne,
        public readonly bool $hasUberEats,
        public readonly ?string $phoneNumber,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('name'),
            $request->file('logo'),
            $request->input('address'),
            $request->input('coordinatesX'),
            $request->input('coordinatesY'),
            $request->input('openingYear'),
            $request->input('closingYear'),
            $request->input('status'),
            // $request->input('isKraft'),
            false,
            $request->input('isFoodTruck'),
            $request->input('network'),
            $request->input('appLink'),
            $request->input('websiteLink'),
            $request->input('hasGlovo') ?? false,
            $request->input('hasPyszne') ?? false,
            $request->input('hasUberEats') ?? false,
            $request->input('phoneNumber'),
        );
    }

    public function toCreateData(): array
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'coordinates_x' => $this->coordinatesX,
            'coordinates_y' => $this->coordinatesY,
            'opening_year' => $this->openingYear,
            'closing_year' => $this->closingYear,
            'status' => $this->status,
            'is_kraft' => $this->isKraft,
            'is_food_truck' => $this->isFoodTruck,
            'network' => $this->network,
            'app_link' => $this->appLink,
            'website_link' => $this->websiteLink,
            'has_glovo' => $this->hasGlovo,
            'has_pyszne' => $this->hasPyszne,
            'has_ubereats' => $this->hasUberEats,
            'phone_number' => $this->phoneNumber,
        ];
    }
}
