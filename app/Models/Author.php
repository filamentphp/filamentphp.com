<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        $table->string('avatar');
        $table->string('github_url');
        $table->string('name');
        $table->string('slug');
        $table->string('twitter_url')->nullable();
    }

    public function getBio(): ?string
    {
        return $this->content;
    }

    public function plugins(): HasMany
    {
        return $this->hasMany(Plugin::class);
    }

    public function getAvatarUrl(): string
    {
        return asset("images/content/authors/avatars/{$this->avatar}");
    }

    public function getStarsCount(): int
    {
        return cache()->remember(
            $this->getStarsCountCacheKey(),
            now()->addDay(),
            fn (): int => Star::query()
                ->where(fn (Builder $query) => $query->where('starrable_type', 'plugin')->whereIn('starrable_id', $this->plugins()->pluck('slug')))
                ->count(),
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
