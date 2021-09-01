<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Sushi\Sushi;

class DocumentationVersion extends Model
{
    use Sushi;

    public $incrementing = false;

    public function packages(): HasMany
    {
        return $this->hasMany(DocumentationPackage::class, 'version_id');
    }

    public function pages(): HasMany
    {
        return $this->hasMany(DocumentationPage::class, 'version_id');
    }

    public function getRows(): array
    {
        return collect(config('documentation'))
            ->map(function (array $version, int $versionNumber): array {
                return [
                    'id' => $versionNumber,
                    'name' => "v{$versionNumber}.x",
                    'slug' => "{$versionNumber}.x",
                ];
            })
            ->values()
            ->toArray();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
