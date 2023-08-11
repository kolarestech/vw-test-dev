<?php

namespace App\Actions\Opportunity;

use App\Enums\OpportunityStatusEnum;
use App\Http\Requests\Opportunity\OpportunityRejectRequest;
use App\Repositories\OpportunityRepository;

class OpportunityRejectAction
{
    protected OpportunityRepository $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    public function exec(OpportunityRejectRequest $request)
    {
        return $this->opportunityRepository->update($request->input("opportunity_identify"), [
            "status" => OpportunityStatusEnum::REJECTED()
        ]);
    }
}
