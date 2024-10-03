<?php

namespace App\Exceptions;

use Exception;

class TimeException extends Exception
{
    public static function invalid(): self
    {
        return new self('Time must be in the format HH:MM', 400);
    }
}
