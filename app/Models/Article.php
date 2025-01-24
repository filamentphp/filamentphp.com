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

class Article extends Model implements Starrable
{
    use Orbital;

    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'categories' => 'array',
        'publish_date' => 'date',
        'versions' => 'array',
    ];

    public static function schema(Blueprint $table)
    {
        $table->string('author_slug');
        $table->json('categories')->nullable();
        $table->date('publish_date');
        $table->string('slug');
        $table->string('title');
        $table->string('type_slug');
        $table->json('versions')->nullable();
        $table->string('canonical_url')->nullable();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ArticleType::class, 'type_slug');
    }

    public function stars(): MorphMany
    {
        return $this->morphMany(Star::class, 'starrable');
    }

    public function getCategories(): Collection
    {
        return ArticleCategory::find($this->categories);
    }

    public function getStarsCount(): int
    {
        return cache()->remember(
            $this->getStarsCountCacheKey(),
            now()->addDay(),
            fn (): int => $this->stars()->where(fn (Builder $query) => $query->whereNull('is_vpn_ip')->orWhere('is_vpn_ip', false))->count(),
        );
    }

    public function isCompatibleWithLatestVersion(): ?bool
    {
        if (empty($this->versions)) {
            return null;
        }

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
        return "article:{$this->slug}:stars_count";
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('publish_date', '<=', now());
    }

    public function getDataArray(): array
    {
        return [
            'id' => $this->slug,
            'title' => $this->title,
            'slug' => $this->slug,
            'publish_date' => $this->publish_date->diffForHumans(),
            'author' => [
                'name' => $this->author->name,
                'avatar' => $this->author->getAvatarUrl(),
            ],
            'categories' => $this->categories,
            'type' => $this->type_slug,
            'versions' => $this->versions,
            'canonical_url' => $this->canonical_url,
        ];
    }
}
