<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;
use Ndate22\Exceptions\InvalidDateException;
use Ndate22\Laravel\NdateServiceProvider;
use Ndate22\Ndate;

beforeEach(fn () => $this->app->register(NdateServiceProvider::class));

test('helpers convert both ways', function () {
    expect((string) to_bs('2023-11-08'))->toBe('2080-07-22')
        ->and((string) to_bs('2023-11-08', 'l, d M, Y', Ndate::NP))->toBe('बुधवार, २२ कार्तिक, २०८०')
        ->and((string) to_ad('2080-07-22'))->toBe('2023-11-08')
        ->and(fn () => to_ad('2080-07-31'))->toThrow(InvalidDateException::class);
});

test('carbon toBs macro', function () {
    $date = Carbon::parse('2023-11-08 15:30');

    expect((string) $date->toBs())->toBe('2080-07-22')
        ->and((string) $date->toBs('d M Y', Ndate::NP))->toBe('२२ कार्तिक २०८०')
        ->and((string) CarbonImmutable::parse('2023-11-08')->toBs())->toBe('2080-07-22');
});

test('facade', function () {
    expect((string) Ndate22\Laravel\Facades\Ndate::to_bs('2023-11-08', 'd/m/Y'))->toBe('22/07/2080')
        ->and((string) Ndate22\Laravel\Facades\Ndate::to_ad('2080-07-22'))->toBe('2023-11-08');
});
