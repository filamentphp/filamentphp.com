<?php

namespace App\Filament\Resources;

use App\Enums\LinkStatus;
use App\Enums\LinkCategory;
use App\Filament\Resources\LinkResource\Pages;
use App\Filament\Resources\LinkResource\RelationManagers;
use App\Filament\Resources\LinkResource\Widgets;
use App\Filament\Resources\LinkResource\Widgets\CreateLinkHeader;
use App\Filament\Resources\LinkResource\Widgets\EditLinkHeader;
use App\Filament\Resources\LinkResource\Widgets\LinkStatusSwitcher;
use App\Filament\Resources\LinkResource\Widgets\ListLinksHeader;
use App\Models\Link;
use Closure;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->reactive()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->label('URL')
                    ->placeholder('https://yourwebsite.com/filament-article')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MultiSelect::make('categories')
                    ->options(collect(LinkCategory::cases())->mapWithKeys(fn (LinkCategory $category): array => [$category->value => $category->getLabel()]))
                    ->columnSpan('full'),
                Forms\Components\Select::make('status')
                    ->options(collect(LinkStatus::cases())->mapWithKeys(fn (LinkStatus $status): array => [$status->value => $status->getLabel()]))
                    ->visible(auth()->user()->is_admin)
                    ->required(),
                Forms\Components\BelongsToSelect::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin)
                    ->required(),
                Forms\Components\Tabs::make('Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Description')
                            ->schema([
                                Forms\Components\MarkdownEditor::make('description')
                                    ->maxLength(150)
                                    ->helperText('A short description of your link. Maximum 150 characters.')
                                    ->toolbarButtons([
                                        'bold',
                                        'edit',
                                        'italic',
                                        'link',
                                        'preview',
                                        'strike',
                                    ])
                                    ->columnSpan('full')
                                    ->disableLabel(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Media')
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('media')
                                    ->image()
                                    ->maxSize(10240)
                                    ->helperText('Images are supported. Recommended dimensions 2560 x 1440 pixels. Max file size 10 MB.')
                                    ->columnSpan('full')
                                    ->disableLabel(),
                            ]),
                    ])
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => LinkStatus::PENDING->value,
                        'success' => LinkStatus::PUBLISHED->value,
                    ])
                    ->enum(collect(LinkStatus::cases())->mapWithKeys(fn (LinkStatus $status): array => [$status->value => $status->getLabel()]))
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options(collect(LinkStatus::cases())->mapWithKeys(fn (LinkStatus $status): array => [$status->value => $status->getLabel()])),
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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\EditLinkHeader::class,
            Widgets\ListLinksHeader::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if ($user->is_admin) {
            return $query;
        }

        return $query->whereBelongsTo($user, 'author');
    }
}
