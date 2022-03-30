<?php

namespace App\Models;

use App\Enums\PluginLicense;
use App\Enums\PluginStatus;
use Flowframe\Previewify\Previewify;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plugin extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $casts = [
        'categories' => 'array',
        'is_featured' => 'boolean',
        'is_paid' => 'boolean',
        'license' => PluginLicense::class,
        'status' => PluginStatus::class,
        'views' => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', PluginStatus::DRAFT);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', PluginStatus::PENDING);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', PluginStatus::PUBLISHED);
    }

    public function getThumbnailUrl(): string
    {
        if ($thumbnailUrl = $this->media->first()?->getUrl()) {
            return $thumbnailUrl;
        }

        if ($thumbnailUrl = cache()->get($this->getThumbnailUrlCacheKey())) {
            return $thumbnailUrl;
        }

        return app(Previewify::class)->signedImageUrl(
            templateId: 850,
            fields: [
                'previewify:code' => $this->github_repository,
                'previewify:image' => asset('/images/icon.png'),
                'previewify:subtitle' => $this->description,
                'previewify:title' => $this->name,
            ],
        );
    }

    public function getCheckoutUrl(): ?string
    {
        if (! $this->is_paid) {
            return null;
        }

        return cache()->get($this->getCheckoutUrlCacheKey());
    }

    public function getPrice(): ?string
    {
        return cache()->get($this->getPriceCacheKey());
    }

    public function hasGitHubStars(): bool
    {
        return cache()->has($this->getGitHubStarsCacheKey());
    }

    public function getGitHubStars(): ?int
    {
        return cache()->get($this->getGitHubStarsCacheKey());
    }

    public function getThumbnailUrlCacheKey(): string
    {
        return "plugins.{$this->getKey()}.thumbnail_url";
    }

    public function getGitHubStarsCacheKey(): string
    {
        return "plugins.{$this->getKey()}.github_stars";
    }

    public function getCheckoutUrlCacheKey(): string
    {
        return "plugins.{$this->getKey()}.checkout_url";
    }

    public function getPriceCacheKey(): string
    {
        return "plugins.{$this->getKey()}.price";
    }

    public function getUrl(): ?string
    {
        if (filled($this->url)) {
            return $this->url;
        }

        if ((! $this->is_paid) && filled($this->github_repository)) {
            return "https://github.com/{$this->github_repository}";
        }

        return null;
    }

    public function getAuthorName(): string
    {
        if (filled($this->author_name)) {
            return $this->author_name;
        }

        return $this->author->name;
    }
}
