<?php

namespace App\Filament\Resources\IngredientTypes;

use App\Filament\Resources\IngredientTypes\Pages\CreateIngredientType;
use App\Filament\Resources\IngredientTypes\Pages\EditIngredientType;
use App\Filament\Resources\IngredientTypes\Pages\ListIngredientTypes;
use App\Filament\Resources\IngredientTypes\Schemas\IngredientTypeForm;
use App\Filament\Resources\IngredientTypes\Tables\IngredientTypesTable;
use App\Models\IngredientType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IngredientTypeResource extends Resource
{
    protected static ?string $model = IngredientType::class;
    protected static string|null|BackedEnum $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Types';

    protected static ?string $modelLabel = 'Type d\'ingredient';

    protected static ?string $pluralModelLabel = 'Types d\'ingredients';

    protected static string|null|\UnitEnum $navigationGroup = 'Ingrédients';

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return IngredientTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IngredientTypesTable::configure($table);
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
            'index' => ListIngredientTypes::route('/'),
            'create' => CreateIngredientType::route('/create'),
            'edit' => EditIngredientType::route('/{record}/edit'),
        ];
    }
}
