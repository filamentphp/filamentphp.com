<?php

namespace App\Filament\Resources;

use App\Enums\ArticleCategory;
use App\Enums\ArticleStatus;
use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Closure;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-alt';

    protected static ?string $navigationLabel = 'Blog';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->reactive()
                    ->afterStateUpdated(function (Page $livewire, Closure $set, ?string $state): void {
                        if ($livewire instanceof Pages\EditArticle) {
                            return;
                        }

                        $set('slug', str($state)->slug());
                    })
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->disabled(fn (?Article $record) => (! auth()->user()->is_admin) && $record?->status === ArticleStatus::Published),
                Forms\Components\MarkdownEditor::make('content')
                    ->columnSpanFull(),
                Forms\Components\Select::make('categories')
                    ->multiple()
                    ->options(collect(ArticleCategory::cases())->mapWithKeys(fn (ArticleCategory $category): array => [$category->value => $category->getLabel()]))
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options(collect(ArticleStatus::cases())->mapWithKeys(fn (ArticleStatus $category): array => [$category->value => $category->getLabel()]))
                    ->visible(auth()->user()->is_admin)
                    ->required(),
                Forms\Components\TextInput::make('views')
                    ->integer()
                    ->default(0)
                    ->required()
                    ->visible(auth()->user()->is_admin),
                Forms\Components\Select::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => ArticleStatus::Pending->value,
                        'success' => ArticleStatus::Published->value,
                    ])
                    ->enum(collect(ArticleStatus::cases())->mapWithKeys(fn (ArticleStatus $status): array => [$status->value => $status->getLabel()]))
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options(collect(ArticleStatus::cases())->mapWithKeys(fn (ArticleStatus $status): array => [$status->value => $status->getLabel()])),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if (! $user) {
            return $query;
        }

        if ($user->is_admin) {
            return $query;
        }

        return $query->whereBelongsTo($user, 'author');
    }
}
