<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sushi\Sushi;

class DocumentationPackage extends Model
{
    use Sushi;

    public function version(): BelongsTo
    {
        return $this->belongsTo(DocumentationVersion::class, 'version_id');
    }

    public function getPage(?string $slug): ?DocumentationPage
    {
        return DocumentationPage::where([
            ['package_slug', $this->slug],
            ['slug', $slug],
            ['version_id', $this->version->getKey()],
        ])->first();
    }

    public function getPages(): Collection
    {
        return DocumentationPage::where([
            ['package_slug', $this->slug],
            ['version_id', $this->version->getKey()],
        ])->with(['version'])->orderBy('order')->get();
    }

    public function getRows(): array
    {
        $packages = [];

        foreach (config('documentation') as $versionNumber => $version) {
            foreach ($version['packages'] as $packageSlug => $package) {
                $packages[] = [
                    'name' => $package['name'],
                    'slug' => $packageSlug,
                    'version_id' => $versionNumber,
                ];
            }
        }

        return $packages;
    }
}
