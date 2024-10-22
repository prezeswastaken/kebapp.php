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

    public static function forbidden(): self
    {
        return new self("You can't do that!", 403);
    }

    public static function mustChangePassword(): self
    {
        return new self('You have to change your password', 403);
    }

    public static function incorrectOldPassword(): self
    {
        return new self('Your old password you provided is incorrect', 403);
    }
}
