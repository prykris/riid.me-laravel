<?php

declare(strict_types=1);

namespace Riidme\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Riidme\Response\ShortenResponse;

/**
 * @method static ShortenResponse shorten(string $url)
 */
class Riidme extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'riidme';
    }
}