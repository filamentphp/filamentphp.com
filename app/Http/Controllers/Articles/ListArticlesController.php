<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleType;
use App\Models\Author;
use App\Models\Star;
use Illuminate\Database\Query\Builder;

class ListArticlesController extends Controller
{
    public function __invoke()
    {
        seo()
            ->title('Articles')
            ->description('A collection of articles written by the Filament team and our community.')
            ->image('https://previewlinks.io/generate/templates/1055/meta?url=' . url()->current())
            ->tag('previewlinks:overline', 'Filament')
            ->tag('previewlinks:title', 'Articles')
            ->tag('previewlinks:subtitle', 'A collection of articles written by the Filament team and our community.')
            ->tag('previewlinks:image', 'https://filamentphp.com/images/icon.png')
            ->tag('previewlinks:repository', 'filament/filament');

        return view('articles.list-articles', [
            'articles' => cache()->remember(
                'articles',
                now()->addMinutes(15),
                function (): array {
                    $stars = Star::query()
                        ->toBase()
                        ->where('starrable_type', 'article')
                        ->where(fn (Builder $query) => $query->whereNull('is_vpn_ip')->orWhere('is_vpn_ip', false))
                        ->groupBy('starrable_id')
                        ->selectRaw('count(id) as count, starrable_id')
                        ->get()
                        ->pluck('count', 'starrable_id');

                    return Article::query()
                        ->published()
                        ->orderByDesc('publish_date')
                        ->with(['author'])
                        ->get()
                        ->map(fn (Article $article): array => [
                            ...$article->getDataArray(),
                            'stars_count' => $stars[$article->getKey()] ?? 0,
                        ])
                        ->all();
                },
            ),
            'articlesCount' => Article::query()
                ->published()
                ->count(),
            'authorsCount' => Author::query()->whereHas('articles')->count(),
            'categories' => ArticleCategory::query()->orderBy('name')->get()->keyBy('slug'),
            'types' => ArticleType::query()->orderBy('name')->get()->keyBy('slug')->map(fn (ArticleType $type): array => [
                'name' => $type->name,
                'slug' => $type->slug,
                'color' => $type->color,
                'icon' => $type->getIcon(),
            ]),
            'starsCount' => Star::query()->where('starrable_type', 'article')->count(),
        ]);
    }
}
