<?php

namespace App\Exceptions;

class AuthException extends AppException
{
    public static function unauthorized(): self
    {
        return new self('Unauthorized! Those credentials didn\'t match our records.', 401);
    }

    public static function adminOnly(): self
    {
        return new self('Unauthorized! You need to be an admin to access this resource.', 403);
    }
}
