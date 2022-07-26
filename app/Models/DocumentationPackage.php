<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function getPagesQuery(): Builder
    {
        return DocumentationPage::where([
            ['package_slug', $this->slug],
            ['version_id', $this->version->getKey()],
        ])->with(['version'])->orderBy('order');
    }

    public function getPages(): Collection
    {
        return $this->getPagesQuery()->get();
    }

    public function getRows(): array
    {
        $packages = [];

        foreach (config('documentation') as $versionNumber => $version) {
            foreach ($version['packages'] as $packageSlug => $package) {
                $packages[] = [
                    'description' => $package['description'],
                    'icon' => $package['icon'] ?? null,
                    'name' => $package['name'],
                    'package' => $package['package'],
                    'slug' => $packageSlug,
                    'version_id' => $versionNumber,
                ];
            }
        }

        return $packages;
    }

    public function getVersions(): Collection
    {
        return DocumentationVersion::find(
            DocumentationPackage::orderByDesc('version_id')->where('slug', $this->slug)->pluck('version_id'),
        );
    }

    public function scopeProduct(Builder $query): Builder
    {
        return $query->whereNot('slug', 'like', '%-plugin');
    }

    public function scopePlugin(Builder $query): Builder
    {
        return $query->where('slug', 'like', '%-plugin');
    }
}
