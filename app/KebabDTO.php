<?php

declare(strict_types=1);

namespace App;

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
        public readonly ?int $openingYear,
        public readonly ?int $closingYear,
        public readonly string $status,
        public readonly bool|string $isKraft,
        public readonly bool|string $isFoodTruck,
        public readonly ?string $network,
        public readonly ?string $appLink,
        public readonly ?string $websiteLink,
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
            $request->input('isKraft'),
            $request->input('isFoodTruck'),
            $request->input('network'),
            $request->input('appLink'),
            $request->input('websiteLink'),
        );
    }

    //     'name' => ['required', 'string', 'max:255'],
    // 'logo' => ['image', 'nullable'],
    // 'address' => ['required', 'string', 'max:255'],
    // 'coordinatesX' => ['required', 'numeric'],
    // 'coordinatesY' => ['required', 'numeric'],
    // 'openingYear' => ['nullable', 'int'],
    // 'closingYear' => ['nullable', 'int'],
    // 'status' => ['required', 'string', 'max:255'],
    // 'isKraft' => ['required', 'boolean'],
    // 'isFoodTruck' => ['required', 'boolean'],
    // 'network' => ['nullable', 'string', 'max:255'],
    // 'appLink' => ['nullable', 'string', 'max:255'],
    // 'websiteLink' => ['nullable', 'string', 'max:255'],
    //
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
        ];
    }
}
