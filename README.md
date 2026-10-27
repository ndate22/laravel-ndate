# Laravel Ndate

Laravel integration for [ndate22/ndate](https://github.com/ndate22/ndate): convert dates between AD and BS (Bikram Sambat) from helpers or straight from Carbon.

## Install

```
composer require ndate22/laravel-ndate
```

The service provider is auto-discovered. Supports Laravel 10, 11 and 12.

## Usage

### Helpers

```php
use Ndate22\Ndate;

echo to_bs('2023-11-08');                              // 2080-07-22
echo to_bs('2023-11-08', 'l, d M, Y');                 // Wednesday, 22 Kartik, 2080
echo to_bs('2023-11-08', 'l, d M, Y', Ndate::NP);      // बुधवार, २२ कार्तिक, २०८०
echo to_bs();                                          // today in BS

echo to_ad('2080-07-22');                              // 2023-11-08
echo to_ad('2080-07-22', 'd/m/Y');                     // 08/11/2023
```

### Facade

```php
use Ndate22\Laravel\Facades\Ndate;   // or the auto-registered `Ndate` alias

echo Ndate::to_bs('2023-11-08', 'd/m/Y');              // 22/07/2080
echo Ndate::to_ad('2080-07-22');                       // 2023-11-08
```

Being a facade, it can be swapped out in tests with `Ndate::shouldReceive('to_bs')->andReturn(...)`.

### Carbon

```php
echo now()->toBs();                                    // today in BS
echo $post->created_at->toBs('d M Y');                 // 22 Kartik 2080
echo $post->created_at->toBs('d M Y', Ndate::NP);      // २२ कार्तिक २०८०
```

### Blade

```blade
{{ $post->created_at->toBs('l, d M, Y', \Ndate22\Ndate::NP) }}
```

Format letters (`d D j l m M n Y`) are listed in the [ndate README](https://github.com/ndate22/ndate#available-date-format). Dates outside the supported range (BS 1970–2100) throw `Ndate22\Exceptions\InvalidDateException`.
