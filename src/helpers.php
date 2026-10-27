<?php

use Ndate22\AdToBs;
use Ndate22\BsToAd;
use Ndate22\Exceptions\InvalidDateException;
use Ndate22\Ndate;

if (! function_exists('to_bs')) {
    /**
     * @throws InvalidDateException
     */
    function to_bs(?string $date = null, ?string $format = null, string $lang = Ndate::EN): AdToBs
    {
        return Ndate::to_bs($date, $format, $lang);
    }
}

if (! function_exists('to_ad')) {
    /**
     * @throws InvalidDateException
     */
    function to_ad(string $date, string $format = 'Y-m-d'): BsToAd
    {
        return Ndate::to_ad($date, $format);
    }
}
