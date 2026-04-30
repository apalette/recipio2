<?php

namespace App\Filament\Resources\IngredientTypes\Pages;

use App\Filament\Resources\IngredientTypes\IngredientTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIngredientType extends EditRecord
{
    protected static string $resource = IngredientTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->visible(fn ($record) => $record->ingredients()->count() === 0)
        ];
    }
}
