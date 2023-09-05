<?php

namespace App\Models;

use App\Models\Contracts\Starrable;
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

    public function getDocs(string $version = null): ?string
    {
        if (filled($this->content)) {
            return $this->content;
        }

        $docs_url = $this->docs_url;

        if (filled($this->docs_urls)) {
            if ($version !== null) {
                $docs_url = $this->docs_urls[$version];
            } else {
                $docs_url = $this->docs_urls[key($this->docs_urls)];
            }
        }

        if (blank($docs_url)) {
            return null;
        }

        try {
            return cache()->remember(
                "plugin:{$this->slug}:docs:{$version}",
                now()->addHour(),
                fn (): string => file_get_contents($docs_url),
            );
        } catch (\Throwable) {
            return null;
        }
    }

    public function isFree(): bool
    {
        return blank($this->price) && blank($this->anystack_id);
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
            fn (): int => $this->stars()->count(),
        );
    }

    public function getImageUrl(): ?string
    {
        if (blank($this->image)) {
            return null;
        }

        return asset("images/content/plugins/images/{$this->image}");
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
}
