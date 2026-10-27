<?php

namespace Ndate22\Laravel;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Ndate22\Ndate;

class NdateServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // now()->toBs(), $model->created_at->toBs('d M Y', Ndate::NP)
        Carbon::macro('toBs', function (?string $format = null, string $lang = Ndate::EN) {
            /** @var Carbon $this */
            return Ndate::to_bs($this->format('Y-m-d'), $format, $lang);
        });
    }
}
