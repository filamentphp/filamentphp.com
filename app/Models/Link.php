<?php

namespace App\Models;

use App\Enums\LinkStatus;
use App\Enums\PluginStatus;
use Flowframe\Previewify\Previewify;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Link extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $casts = [
        'categories' => 'array',
        'status' => LinkStatus::class,
        'views' => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', LinkStatus::DRAFT);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', LinkStatus::PENDING);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', LinkStatus::PUBLISHED);
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
            templateId: 852,
            fields: [
                'previewify:site' => parse_url($this->url, PHP_URL_HOST),
                'previewify:subtitle' => $this->description,
                'previewify:title' => $this->name,
            ],
        );
    }

    public function getThumbnailUrlCacheKey(): string
    {
        return "links.{$this->getKey()}.thumbnail_url";
    }
}
