<?php

namespace App\Http\Controllers\Api\Opportunities;

use App\Actions\Opportunity\OpportunityApproveAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Opportunity\OpportunityApproveRequest;
use App\Http\Resources\Opportunity\OpportunityApproveResource;

class ApproveController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function approve(OpportunityApproveRequest $opportunityApproveRequest, OpportunityApproveAction $action)
    {
        return new OpportunityApproveResource($action->exec($opportunityApproveRequest));
    }
}
