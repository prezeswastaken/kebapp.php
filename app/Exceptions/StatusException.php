<?php

namespace App\Exceptions;

class StatusException extends AppException
{
    public static function invalid(): self
    {
        return new self('Invalid status', 400);
    }
}
