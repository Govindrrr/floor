<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
