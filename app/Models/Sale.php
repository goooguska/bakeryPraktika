<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'date_sale',
        'quantity',
    ];
}
