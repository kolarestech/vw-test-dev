<?php

namespace App\Models;

use App\Enums\OpportunityStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        "uuid",
        "client_identify",
        "user_identify",
        "name",
        "value",
        "status"
    ];

    protected $append = [
        "status_text"
    ];

    public function getStatusTextAttribute()
    {
        return $this->status;
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'uuid', 'client_identify');
    }

    public function seller()
    {
        return $this->hasOne(User::class, 'uuid', 'user_identify');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,  'opportunity_product',
            'opportunity_identify', 'product_identify', 'uuid', 'uuid');
    }
}
