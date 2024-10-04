<?php

declare(strict_types=1);

namespace App\Exceptions;

class LogoException extends AppException
{
    public static function cantStore(): self
    {
        return new self("Can't store the logo", 500);
    }

    public static function cantDelete(): self
    {
        return new self("Can't delete the old logo", 500);
    }
}
