<?php

namespace Ndate22\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Ndate22\AdToBs to_bs(?string $date = null, ?string $format = null, string $lang = 'en')
 * @method static \Ndate22\BsToAd to_ad(?string $date = null, string $format = 'Y-m-d', string $lang = 'en')
 *
 * @see \Ndate22\Ndate
 */
class Ndate extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        // ponytail: Ndate has no dependencies, so the container builds it without a binding
        return \Ndate22\Ndate::class;
    }
}
