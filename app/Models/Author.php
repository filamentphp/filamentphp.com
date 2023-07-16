<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;
use Orbit\Drivers\Markdown;

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
        return asset("images/content/authors/{$this->avatar}");
    }

    public function getStarsCount(): int
    {
        // TODO: Implement stars count with cache
        return 199;
    }
}
