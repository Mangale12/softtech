<?php

namespace App\Exceptions;

use Exception;

class CustomUnauthorizedException extends Exception
{
    public static function forPermissions(array $permissions): self
    {
        $permissions = implode(', ', $permissions);

        // Custom message in Nepali
        return new static("तपाईंलाई आवश्यक अनुमतिहरू छैनन्: {$permissions}");
    }

    public static function notLoggedIn(): self
    {
        // Custom message in Nepali
        return new static('तपाईं लगइन गरिएको छैन्।');
    }
}
