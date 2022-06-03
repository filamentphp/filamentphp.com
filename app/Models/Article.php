<?php

namespace App\Models;

use App\Enums\ArticleCategory;
use App\Enums\ArticleStatus;
use App\Enums\TrickCategory;
use App\Enums\TrickStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Spatie\Comments\Models\Concerns\HasComments;

class Article extends Model
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
        return route('tricks', ['trick' => $this]);
    }
}
