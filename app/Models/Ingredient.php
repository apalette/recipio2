<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_type_id',
        'label',
        'slug',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(IngredientType::class, 'ingredient_type_id');
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(RecipeIngredient::class);
    }
}
