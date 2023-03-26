<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
    public function productRelation(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'category', 'id');
    }
}