<?php

namespace App\Actions\Opportunity;

use App\Enums\OpportunityStatusEnum;
use App\Http\Requests\Opportunity\OpportunityApproveRequest;
use App\Repositories\OpportunityRepository;

class OpportunityApproveAction
{
    protected $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    public function exec(OpportunityApproveRequest $request)
    {
        return $this->opportunityRepository->update($request->input("opportunity_identify"), [
            "status" => OpportunityStatusEnum::APPROVED()
        ]);
    }
}
