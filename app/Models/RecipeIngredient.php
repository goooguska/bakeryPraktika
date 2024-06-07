<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeIngredient extends Model
{
    protected $fillable = [
        'recipe_id',
        'ingredient_id',
    ];
    use HasFactory;
  
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
    public function productRecipe(): BelongsTo
    {
        return $this->belongsTo(ProductRecipe::class);
    }
}
