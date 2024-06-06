<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'info',
        'baking_time',

    ];
    use HasFactory;
    public function recipeIngredients(): BelongsToMany
    {
        return $this->belongsToMany(RecipeIngredient::class);
    }
}
