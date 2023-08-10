<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
      "uuid", "name", "price"
    ];

    public function opportunities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Opportunity::class, 'opportunity_product',
            'product_identify', 'opportunity_identify', 'uuid', 'uuid');
    }
}
