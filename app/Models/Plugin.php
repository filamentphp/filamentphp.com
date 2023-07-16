<?php

namespace App\Models;

use App\Enums\PluginLicense;
use App\Enums\PluginStatus;
use Carbon\CarbonInterface;
use Flowframe\Previewify\Previewify;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;
use Orbit\Drivers\Markdown;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plugin extends Model
{
    use Orbital;

    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'categories' => 'array',
        'has_dark_theme' => 'boolean',
        'has_translations' => 'boolean',
        'versions' => 'array',
    ];

    public static function schema(Blueprint $table)
    {
        $table->string('anystack_id')->nullable();
        $table->string('author_slug');
        $table->json('categories')->nullable();
        $table->text('description')->nullable();
        $table->string('github_repository');
        $table->boolean('has_dark_theme')->default(false);
        $table->boolean('has_translations')->default(false);
        $table->string('image');
        $table->string('name');
        $table->string('slug');
        $table->string('url')->nullable();
        $table->json('versions')->nullable();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function stars(): MorphMany
    {
        return $this->morphMany(Star::class, 'starrable');
    }

    public function getDocs(): ?string
    {
        return $this->content;
    }

    public function isFree(): bool
    {
        return blank($this->anystack_id);
    }

    public function getPurchaseUrl(): ?string
    {
        // TODO: Implement purchase url
        return null;
    }

    public function getPrice(): string
    {
        // TODO: Implement price fetching
        return $this->isFree() ? 'Free' : '$199';
    }

    public function getStarsCount(): int
    {
        // TODO: Implement stars count with cache
        return 199;
    }

    public function getImageUrl(): string
    {
        return asset("images/content/plugins/{$this->image}");
    }

    public function getLatestActivityAt(): CarbonInterface
    {
        // TODO: Implement latest activity at
        return now();
    }

    public function isActivelyMaintained(): bool
    {
        // TODO: implement
        return true;
    }

    public function getCategories(): Collection
    {
        return PluginCategory::find($this->categories);
    }

    public function isCompatibleWithLatestVersion(): bool
    {
        return in_array(3, $this->versions);
    }
}
