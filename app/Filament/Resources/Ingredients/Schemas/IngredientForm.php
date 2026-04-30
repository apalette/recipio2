<?php

namespace App\Filament\Resources\Ingredients\Schemas;

use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class IngredientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('ingredient_type_id')
                    ->label('Type d’ingrédient')
                    ->relationship('type', 'label')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('label')
                    ->label('Libellé')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(),
            ]);
    }
}
