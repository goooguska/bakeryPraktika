<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductRecipe extends Model
{  protected $fillable = [
    'product_id',
    'recipe_id',


];
    use HasFactory;
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function recipeIngredient(): BelongsTo
    {
        return $this->belongsTo(RecipeIngredient::class);
    }
   
}
