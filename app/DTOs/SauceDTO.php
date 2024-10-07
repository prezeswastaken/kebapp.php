<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Http\Requests\SauceRequest;

class SauceDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?bool $isSpicy,
    ) {}

    public static function fromRequest(SauceRequest $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('isSpicy'),
        );
    }

    public function toCreateArray(): array
    {

        return [
            'name' => $this->name,
            'is_spicy' => $this->isSpicy,
        ];
    }
}
