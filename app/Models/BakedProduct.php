<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BakedProduct extends Model
{
    protected $fillable = [
        'baker_id',
        'productRecipe_id',
        'date_baking',
        'date_sale',
    ];
    use HasFactory;
    public function baker(): BelongsTo
    {
        return $this->belongsTo(Baker::class);
    }
    public function productRecipe(): BelongsTo
    {
        return $this->belongsTo(ProductRecipe::class);
    }
}
