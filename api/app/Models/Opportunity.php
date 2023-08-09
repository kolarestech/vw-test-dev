<?php

namespace App\Models;

use App\Enums\OpportunityStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "value", "status", "uuid"
    ];

    protected $append = [
        "status_text"
    ];

    public function getStatusTextAttribute()
    {
        return $this->status;
    }
}
