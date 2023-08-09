<?php

namespace App\Observers;

use App\Models\Opportunity;
use Illuminate\Support\Str;

class OpportunityObserver
{
    /**
     * Handle the Opportunity "created" event.
     */
    public function creating(Opportunity $opportunity): void
    {
        $opportunity->uuid = Str::uuid();
    }
}
