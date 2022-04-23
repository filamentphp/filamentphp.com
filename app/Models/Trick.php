<?php

namespace App\Models;

use App\Enums\TrickCategory;
use App\Enums\TrickStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Trick extends Model
{
    use HasFactory;

    protected $casts = [
        'categories' => 'array',
        'status' => TrickStatus::class,
        'views' => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', TrickStatus::DRAFT);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', TrickStatus::PENDING);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', TrickStatus::PUBLISHED);
    }

    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function getAuthorName(): String
    {
        if (filled($this->author_name)) {
            return $this->author_name;
        }

        return $this->author->name;
    }

    public function getCategoryLabels(): Collection
    {
        $options = collect(TrickCategory::cases())->mapWithKeys(fn (TrickCategory $category): array => [$category->value => $category->getLabel()]);

        return collect($this->categories)->map(fn ($item) => $options[$item]);
    }
}