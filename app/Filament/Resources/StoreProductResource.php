<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoreProductResource\Pages;
use App\Filament\Resources\StoreProductResource\RelationManagers;
use App\Models\Plugin;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class StoreProductResource extends Resource
{
    protected static ?string $model = Plugin::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author_id')
                    ->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\Textarea::make('docs'),
                Forms\Components\Toggle::make('is_hosted')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('package_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_id'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('docs'),
                Tables\Columns\BooleanColumn::make('is_hosted'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('package_name'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListStoreProducts::route('/'),
            'create' => Pages\CreateStoreProduct::route('/create'),
            'edit' => Pages\EditStoreProduct::route('/{record}/edit'),
        ];
    }
}
