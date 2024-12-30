<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Author extends Model
{
    use HasFactory;
    use Orbital;

    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    public $incrementing = false;

    public static function schema(Blueprint $table)
    {
        $table->string('avatar')->nullable();
        $table->string('github_url');
        $table->string('name');
        $table->string('slug');
        $table->string('twitter_url')->nullable();
        $table->string('mastodon_url')->nullable();
        $table->string('sponsor_url')->nullable();
    }

    public function getBio(): ?string
    {
        return $this->content;
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function plugins(): HasMany
    {
        return $this->hasMany(Plugin::class);
    }

    public function getAvatarUrl(): string
    {
        return asset('images/content/authors/avatars/' . ($this->avatar ?? "{$this->slug}.webp"));
    }

    public function getStarsCount(): int
    {
        return cache()->remember(
            $this->getStarsCountCacheKey(),
            now()->addDay(),
            fn (): int => Star::query()
                ->where(fn (Builder $query) => $query->whereNull('is_vpn_ip')->orWhere('is_vpn_ip', false))
                ->where(fn (Builder $query) => $query->where('starrable_type', 'article')->whereIn('starrable_id', $this->articles()->pluck('slug')))
                ->orWhere(fn (Builder $query) => $query->where('starrable_type', 'plugin')->whereIn('starrable_id', $this->plugins()->pluck('slug')))
                ->count(),
        );
    }

    protected function starsCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getStarsCount(),
        );
    }

    public function cacheStarsCount(): void
    {
        cache()->forget($this->getStarsCountCacheKey());

        $this->getStarsCount();
    }

    public function getStarsCountCacheKey(): string
    {
        return "author:{$this->slug}:stars_count";
    }
}
