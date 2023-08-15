<?php

namespace App\Actions\Opportunity;

use App\Http\Requests\Opportunity\OpportunityStoreRequest;
use App\Repositories\OpportunityRepository;

class OpportunityStoreAction
{
    protected $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    public function exec(OpportunityStoreRequest $request)
    {
        $opportunity = $this->opportunityRepository->store($request->validated());

        $opportunity->products()->attach($request->input('products'));

        return $opportunity;
    }
}
