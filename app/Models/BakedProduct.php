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
        'quantity'
    ];
    use HasFactory;
    public function baker(): BelongsTo
    {
        return $this->belongsTo(Baker::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
