<?php

namespace App\Models;

use App\Enums\ArticleCategory;
use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Spatie\Comments\Models\Concerns\HasComments;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Article extends Model implements Feedable
{
    use HasComments;
    use HasFactory;

    protected $casts = [
        'categories' => 'array',
        'favorites' => 'integer',
        'status' => ArticleStatus::class,
        'views' => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', ArticleStatus::Draft);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', ArticleStatus::Pending);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', ArticleStatus::Published);
    }

    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function getCategoryLabels(): Collection
    {
        $options = collect(ArticleCategory::cases())->mapWithKeys(fn (ArticleCategory $category): array => [$category->value => $category->getLabel()]);

        return collect($this->categories)->map(fn ($item) => $options[$item]);
    }

    public function commentableName(): string
    {
        return "{$this->title} by {$this->author->name}";
    }

    public function commentUrl(): string
    {
        return $this->getUrl();
    }

    public function getUrl(): string
    {
        return route('blog.article', ['article' => $this]);
    }

    public static function getFeedItems(): Collection
    {
        return Article::all();
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->authorEmail($this->author->email)
            ->authorName($this->author->name)
            ->category(...collect($this->categories)->map(fn (string $category): string => ArticleCategory::tryFrom($category)?->getLabel())->toArray())
            ->link($this->getUrl())
            ->summary(str($this->content)->limit())
            ->title($this->title)
            ->updated($this->updated_at);
    }
}
