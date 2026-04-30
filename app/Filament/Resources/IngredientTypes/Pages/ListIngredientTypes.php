<?php

namespace App\Filament\Resources\IngredientTypes\Pages;

use App\Filament\Resources\IngredientTypes\IngredientTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIngredientTypes extends ListRecords
{
    protected static string $resource = IngredientTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
