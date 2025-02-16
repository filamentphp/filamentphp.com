<?php

namespace App\Models;

use App\Models\Contracts\Starrable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Plugin extends Model implements Starrable
{
    use Orbital;

    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'categories' => 'array',
        'has_dark_theme' => 'boolean',
        'has_translations' => 'boolean',
        'is_lemon_squeezy_embedded' => 'boolean',
        'is_presale' => 'boolean',
        'is_draft' => 'boolean',
        'versions' => 'array',
        'publish_date' => 'date',
        'docs_urls' => 'array',
    ];

    public static function schema(Blueprint $table)
    {
        $table->string('anystack_id')->nullable();
        $table->string('author_slug');
        $table->json('categories')->nullable();
        $table->string('checkout_url')->nullable();
        $table->text('description')->nullable();
        $table->string('docs_url')->nullable();
        $table->json('docs_urls')->nullable();
        $table->string('discord_url')->nullable();
        $table->string('github_repository');
        $table->boolean('has_dark_theme')->default(false);
        $table->boolean('has_translations')->default(false);
        $table->string('image')->nullable();
        $table->boolean('is_draft')->nullable()->default(false);
        $table->boolean('is_lemon_squeezy_embedded')->nullable()->default(false);
        $table->boolean('is_presale')->nullable()->default(false);
        $table->string('name');
        $table->string('price')->nullable();
        $table->string('slug');
        $table->string('thumbnail')->nullable();
        $table->string('url')->nullable();
        $table->json('versions')->nullable();
        $table->date('publish_date');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function stars(): MorphMany
    {
        return $this->morphMany(Star::class, 'starrable');
    }

    public function scopeDraft(Builder $query, bool $condition = true): Builder
    {
        if (! $condition) {
            return $query->whereNull('is_draft')->orWhere('is_draft', false);
        }

        return $query->where('is_draft', true);
    }

    public function getDocUrl(string $version = null): ?string
    {
        if (filled($this->docs_url)) {
            return $this->docs_url;
        }

        if (filled($this->docs_urls)) {
            return $this->docs_urls[$version ?? key($this->docs_urls)] ?? null;
        }

        return null;
    }

    public function getDocs(string $version = null): ?string
    {
        if (filled($this->content)) {
            return $this->content;
        }

        if (blank($url = $this->getDocUrl($version))) {
            return null;
        }

        try {
            return cache()->remember(
                "plugin:{$this->slug}:docs:{$version}",
                now()->addHour(),
                fn (): string => file_get_contents($url),
            );
        } catch (\Throwable) {
            return null;
        }
    }

    public function isFree(): bool
    {
        return blank($this->price) && blank($this->anystack_id);
    }

    public function isDraft(): bool
    {
        return (bool) $this->is_draft;
    }

    public function getCheckoutUrl(): ?string
    {
        if (filled($this->checkout_url)) {
            return $this->checkout_url;
        }

        return cache()->get($this->getCheckoutUrlCacheKey());
    }

    public function getPrice(): ?string
    {
        if ($this->isFree()) {
            return 'Free';
        }

        if (filled($this->price)) {
            return $this->price;
        }

        return cache()->get($this->getPriceCacheKey()) ?: '$0.00';
    }

    public function getStarsCount(): int
    {
        return cache()->remember(
            $this->getStarsCountCacheKey(),
            now()->addDay(),
            fn (): int => $this->stars()->where(fn (Builder $query) => $query->whereNull('is_vpn_ip')->orWhere('is_vpn_ip', false))->count(),
        );
    }

    public function getImageUrl(): ?string
    {
        return asset('images/content/plugins/images/' . ($this->image ?? "{$this->slug}.webp"));
    }

    public function getThumbnailUrl(): ?string
    {
        if (blank($this->thumbnail)) {
            return $this->getImageUrl();
        }

        return asset("images/content/plugins/thumbnails/{$this->thumbnail}");
    }

    public function getCategories(): Collection
    {
        return PluginCategory::find($this->categories);
    }

    public function isCompatibleWithLatestVersion(): bool
    {
        return in_array(3, $this->versions);
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function cacheStarsCount(): void
    {
        cache()->forget($this->getStarsCountCacheKey());

        $this->getStarsCount();
    }

    public function getStarsCountCacheKey(): string
    {
        return "plugin:{$this->slug}:stars_count";
    }

    public function getPriceCacheKey(): string
    {
        return "plugin:{$this->slug}:price";
    }

    public function getCheckoutUrlCacheKey(): string
    {
        return "plugin:{$this->slug}:checkout_url";
    }

    public function getDocsCacheKeys(): array
    {
        return [
            "plugin:{$this->slug}:docs:",
            ...array_map(fn ($key) => "plugin:{$this->slug}:docs:{$key}", array_keys($this->docs_urls)),
        ];
    }

    public function getDataArray(): array
    {
        return [
            'id' => $this->slug,
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->getPrice(),
            'thumbnail_url' => $this->getThumbnailUrl(),
            'github_repository' => $this->github_repository,
            'description' => $this->description,
            'author' => [
                'name' => $this->author->name,
                'avatar' => $this->author->getAvatarUrl(),
            ],
            'features' => [
                'dark_theme' => $this->has_dark_theme,
                'translations' => $this->has_translations,
            ],
            'categories' => $this->categories,
            'versions' => $this->versions,
            'publish_date' => $this->publish_date->format('Y-m-d'),
        ];
    }
}
