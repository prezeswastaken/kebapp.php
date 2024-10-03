<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\StatusException;

enum KebabStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Planned = 'planned';

    public static function fromString(string $status): self
    {
        return match (strtolower($status)) {
            'active' => self::Active,
            'inactive' => self::Inactive,
            'planned' => self::Planned,
            default => throw StatusException::invalid(),
        };
    }
}
