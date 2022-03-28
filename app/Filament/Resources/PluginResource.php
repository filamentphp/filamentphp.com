<?php

namespace App\Filament\Resources;

use App\Enums\PluginCategory;
use App\Enums\PluginLicense;
use App\Enums\PluginStatus;
use App\Filament\Resources\PluginResource\Pages;
use App\Filament\Resources\PluginResource\RelationManagers;
use App\Filament\Resources\PluginResource\Widgets;
use App\Filament\Resources\PluginResource\Widgets\PluginStatusSwitcher;
use App\Models\Plugin;
use Closure;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class PluginResource extends Resource
{
    protected static ?string $model = Plugin::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->reactive()
                    ->afterStateUpdated(function (Page $livewire, Closure $set, ?string $state): void {
                        if ($livewire instanceof Pages\EditPlugin) {
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
                    ->disabled(fn (?Plugin $record) => (! auth()->user()->is_admin) && $record?->status === PluginStatus::PUBLISHED),
                Forms\Components\Toggle::make('is_paid')
                    ->label('Paid plugin')
                    ->reactive()
                    ->default(false)
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('github_repository')
                    ->label('GitHub repository')
                    ->placeholder('vendor/filament-plugin')
                    ->maxLength(255)
                    ->hidden(fn (Closure $get): bool => (bool) $get('is_paid')),
                Forms\Components\Placeholder::make('unlock_advertising_notice')
                    ->content(new HtmlString('We\'ve partnered with <a href="https://unlock.sh" target="_blank"><strong>Unlock.sh</strong></a> to allow you to advertise your paid plugins on our website. To set this up, visit the <strong>Advertising</strong> section of your Unlock product page, and opt-in to advertising on the <strong>Filament Website</strong>. If you do not follow these instructions, visitors will not see a checkout link for your product.'))
                    ->visible(fn (Closure $get): bool => (bool) $get('is_paid'))
                    ->disableLabel()
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('unlock_id')
                    ->label('Unlock ID')
                    ->placeholder('34d01c30-3caf-4571-8259-add9dc21d85f')
                    ->maxLength(255)
                    ->visible(fn (Closure $get): bool => (bool) $get('is_paid'))
                    ->helperText('You can find this from your <a href="https://unlock.sh" target="_blank">Unlock.sh</a> product settings.'),
                Forms\Components\TextInput::make('url')
                    ->label('URL')
                    ->placeholder('https://yourwebsite.com/filament-plugin')
                    ->hint('External documentation or marketing website')
                    ->helperText(fn (Closure $get): string => $get('is_paid') ? '' : 'We\'ll use your GitHub repository if you don\'t provide a custom URL here.')
                    ->maxLength(255),
                Forms\Components\MultiSelect::make('categories')
                    ->options(collect(PluginCategory::cases())->mapWithKeys(fn (PluginCategory $category): array => [$category->value => $category->getLabel()]))
                    ->columnSpan('full'),
                Forms\Components\Select::make('status')
                    ->options(collect(PluginStatus::cases())->mapWithKeys(fn (PluginStatus $status): array => [$status->value => $status->getLabel()]))
                    ->visible(auth()->user()->is_admin)
                    ->required(),
                Forms\Components\BelongsToSelect::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin)
                    ->required(),
                Forms\Components\Toggle::make('is_featured')
                    ->visible(auth()->user()->is_admin)
                    ->columnSpan('full'),
                Forms\Components\Tabs::make('Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Description')
                            ->schema([
                                Forms\Components\MarkdownEditor::make('description')
                                    ->maxLength(150)
                                    ->helperText('A short description of your plugin. Maximum 150 characters.')
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
                        Forms\Components\Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                                    ->image()
                                    ->multiple()
                                    ->maxSize(10240)
                                    ->enableReordering()
                                    ->helperText('Images are supported. Recommended dimensions 1200 x 600 pixels. Max file size 10 MB. Please use light mode when taking screenshots where possible.')
                                    ->columnSpan('full')
                                    ->disableLabel(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Documentation')
                            ->schema([
                                Forms\Components\MarkdownEditor::make('docs')
                                    ->maxLength(4294967295)
                                    ->columnSpan('full')
                                    ->disableLabel(),
                            ]),
                        Forms\Components\Tabs\Tab::make('License')
                            ->schema([
                                Forms\Components\Select::make('license')
                                    ->options(collect(PluginLicense::cases())->mapWithKeys(fn (PluginLicense $license): array => [$license->value => $license->getLabel()]))
                                    ->reactive(),
                                Forms\Components\TextInput::make('license_url')->label('URL'),
                            ])
                            ->columns(2),
                    ])
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
                        'warning' => PluginStatus::PENDING->value,
                        'success' => PluginStatus::PUBLISHED->value,
                    ])
                    ->enum(collect(PluginStatus::cases())->mapWithKeys(fn (PluginStatus $status): array => [$status->value => $status->getLabel()]))
                    ->sortable(),
                Tables\Columns\TextColumn::make('github_repository')
                    ->label('GitHub repository')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->visible(auth()->user()->is_admin),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options(collect(PluginStatus::cases())->mapWithKeys(fn (PluginStatus $status): array => [$status->value => $status->getLabel()])),
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
            'index' => Pages\ListPlugins::route('/'),
            'create' => Pages\CreatePlugin::route('/create'),
            'edit' => Pages\EditPlugin::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\EditPluginHeader::class,
            Widgets\ListPluginsHeader::class,
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
