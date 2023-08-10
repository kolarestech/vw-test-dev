<?php

namespace App\Actions\Opportunity;

use App\Http\Requests\Opportunity\OpportunityIndexRequest;
use App\Repositories\OpportunityRepository;

class OpportunityIndexAction
{
    protected $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    public function exec(OpportunityIndexRequest $request)
    {
        return $this->opportunityRepository->getAll($request->validated());
    }
}
