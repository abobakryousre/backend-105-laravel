<?php

namespace App\Helper;

enum HttpResponses: int
{
    case SUCCESS = 200;
    case CREATED = 201;
    case PAGE_NOT_FOUND = 404;

    public function message()
    {
        return match ($this) {
            self::SUCCESS => "Request Done Successfully",
            self::CREATED => "Resource Created Successfully",
            self::PAGE_NOT_FOUND => "Resource Not Found",
        };
    }
}
