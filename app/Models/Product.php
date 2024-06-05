<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'info',
        'cost',
        'recipe_id',


    ];
    use HasFactory;
    public function recipeIngredient(): BelongsTo
    {
        return $this->belongsTo(RecipeIngredients::class);
    }
  
}
