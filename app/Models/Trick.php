<?php

namespace App\Models;

use App\Enums\TrickCategory;
use App\Enums\TrickStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Spatie\Comments\Models\Concerns\HasComments;

class Trick extends Model
{
    use HasComments;
    use HasFactory;

    protected $casts = [
        'categories' => 'array',
        'favorites' => 'integer',
        'status' => TrickStatus::class,
        'views' => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', TrickStatus::Draft);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', TrickStatus::Pending);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', TrickStatus::Published);
    }

    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function getCategoryLabels(): Collection
    {
        $options = collect(TrickCategory::cases())->mapWithKeys(fn (TrickCategory $category): array => [$category->value => $category->getLabel()]);

        return collect($this->categories)->map(fn ($item) => $options[$item]);
    }

    public function getFavoriteKey(): string
    {
        return "tricks.{$this->getKey()}.favorites.".request()->ip();
    }

    public function isFavorite(): bool
    {
        return cache()->has($this->getFavoriteKey());
    }

    public function toggleFavorite(): void
    {
        if (! $this->isFavorite()) {
            cache()->put($this->getFavoriteKey(), now());

            $this->favorites++;
            $this->save();

            return;
        }

        cache()->forget($this->getFavoriteKey());

        $this->favorites--;

        if ($this->favorites < 0) {
            $this->favorites = 0;
        }

        $this->save();
    }

    public function commentableName(): string
    {
        return "{$this->title} by {$this->author->name}";
    }

    public function commentUrl(): string
    {
        return route('tricks.view', ['trick' => $this]);
    }
}
