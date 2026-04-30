<?php

namespace App\Filament\Resources\IngredientTypes\Pages;

use App\Filament\Resources\IngredientTypes\IngredientTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIngredientType extends CreateRecord
{
    protected static string $resource = IngredientTypeResource::class;
}
