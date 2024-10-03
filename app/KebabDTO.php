<?php

declare(strict_types=1);

namespace App;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\ImageFile;

class KebabDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected string $name,
        protected ?ImageFile $logo,
        protected string $address,
        protected float $coordinatesX,
        protected float $coordinatesY,
        protected ?int $openingYear,
        protected ?int $closingYear,
        protected string $status,
        protected bool $isKraft,
        protected bool $isFoodTruck,
        protected ?string $network,
        protected ?string $appLink,
        protected ?string $websiteLink,
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

}
