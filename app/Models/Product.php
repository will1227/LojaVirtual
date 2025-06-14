<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'price', 'type_id', 'image_path'];

    public function type():BelongsTo{
        return $this->belongsTo(Type::class);

    }
    
}
