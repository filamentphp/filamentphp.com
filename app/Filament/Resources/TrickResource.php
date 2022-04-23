<?php

namespace App\Filament\Resources;

use App\Enums\TrickCategory;
use App\Enums\TrickStatus;
use App\Filament\Resources\TrickResource\Pages;
use App\Filament\Resources\TrickResource\RelationManagers;
use App\Models\Trick;
use Closure;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class TrickResource extends Resource
{
    protected static ?string $model = Trick::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->reactive()
                    ->afterStateUpdated(function (Page $livewire, Closure $set, ?string $state): void {
                        if ($livewire instanceof Pages\EditTrick) {
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
                    ->disabled(fn (?Trick $record) => (! auth()->user()->is_admin) && $record?->status === TrickStatus::PUBLISHED),
                Forms\Components\MultiSelect::make('categories')
                    ->options(collect(TrickCategory::cases())->mapWithKeys(fn (TrickCategory $category): array => [$category->value => $category->getLabel()]))
                    ->columnSpan('full'),
                Forms\Components\Select::make('status')
                    ->options(collect(TrickStatus::cases())->mapWithKeys(fn (TrickStatus $category): array => [$category->value => $category->getLabel()]))
                    ->visible(auth()->user()->is_admin)
                    ->required(),
                Forms\Components\TextInput::make('views')
                    ->integer()
                    ->default(0)
                    ->required()
                    ->visible(auth()->user()->is_admin),
                Forms\Components\BelongsToSelect::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin)
                    ->required(),
                Forms\Components\MarkdownEditor::make('description')
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => TrickStatus::PENDING->value,
                        'success' => TrickStatus::PUBLISHED->value,
                    ])
                    ->enum(collect(TrickStatus::cases())->mapWithKeys(fn (TrickStatus $status): array => [$status->value => $status->getLabel()]))
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options(collect(TrickStatus::cases())->mapWithKeys(fn (TrickStatus $status): array => [$status->value => $status->getLabel()])),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTricks::route('/'),
            'create' => Pages\CreateTrick::route('/create'),
            'edit' => Pages\EditTrick::route('/{record}/edit'),
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
