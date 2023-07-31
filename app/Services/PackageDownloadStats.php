<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PackageDownloadStats
{
    public function __invoke(string $package = 'filament/support')
    {
        return cache()->remember(
            "package:{$package}:downloads_count",
            now()->addDay(),
            function () use ($package): int {
                $response = Http::get("https://packagist.org/packages/{$package}/stats.json");

                return $response->json('downloads.total') ?? 0;
            },
        );
    }
}
