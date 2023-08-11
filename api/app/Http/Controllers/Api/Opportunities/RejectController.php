<?php

namespace App\Http\Controllers\Api\Opportunities;

use App\Actions\Opportunity\OpportunityRejectAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Opportunity\OpportunityRejectRequest;
use App\Http\Resources\Opportunity\OpportunityRejectResource;

class RejectController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function reject(OpportunityRejectRequest $opportunityApproveRequest, OpportunityRejectAction $action)
    {
        return new OpportunityRejectResource($action->exec($opportunityApproveRequest));
    }
}
