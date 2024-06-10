<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baker extends Model
{
    protected $fillable = [
        'name',
        'shift_at_work',
    ];
    use HasFactory;
}
