<?php

namespace App\Http\Controllers\Api\Opportunities;

use App\Actions\Opportunity\OpportunityStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Opportunity\OpportunityStoreRequest;
use App\Http\Resources\Opportunity\OpportunityStoreResource;

class StoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(OpportunityStoreRequest $request, OpportunityStoreAction $action)
    {
        $storedOpportunity = $action->exec($request);

        return new OpportunityStoreResource($storedOpportunity);
    }
}
