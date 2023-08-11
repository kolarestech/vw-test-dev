<?php

namespace App\Http\Controllers\Api\Opportunities;

use App\Actions\Opportunity\OpportunityIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Opportunity\OpportunityIndexRequest;
use App\Http\Resources\Opportunity\OpportunityIndexResource;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OpportunityIndexRequest $indexRequest,  OpportunityIndexAction $indexAction)
    {
        return OpportunityIndexResource::collection($indexAction->exec($indexRequest));
    }
}
