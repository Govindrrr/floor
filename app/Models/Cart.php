<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    public function user():BelongsTo
    {   
        return $this->belongsTo(User::class);       
    }
    public function product():BelongsTo
    {   
        return $this->belongsTo(Product::class);       
    }
    public function vendor():BelongsTo
    {   
        return $this->belongsTo(Vendor::class);       
    }
}
