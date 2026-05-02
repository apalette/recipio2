<?php

namespace App\Filament\Resources\Recipes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RecipeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Titre')
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

                Fieldset::make('Durée')
                    ->schema([
                        TextInput::make('time_min')
                            ->label('Minimum')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->maxValue(60 * 10)
                            ->nullable(),
                        TextInput::make('time_max')
                            ->label('Maximum')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->maxValue(60 * 10)
                            ->nullable()
                            /*->rules([
                                'exclude_if:time_min,null',
                                'gte:time_min',
                            ])*/
                    ]),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->columnSpan(2)
                    ->rows(20)
                    ->maxLength(50000)
                    ->live()
                    ->helperText(fn (?string $state) => mb_strlen($state ?? '') . ' / 10000 caractères'),
            ]);
    }
}
