<?php

namespace App\Http\Resources\Opportunity;

use App\Enums\OpportunityStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OpportunityIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "identify" => $this->uuid,
            "name" => $this->name,
            "status" => OpportunityStatusEnum::getKey((int)$this->status),
            "value" => $this->value,
            "client" => $this->client,
            "seller" => $this->seller,
            "products" => $this->products
        ];
    }
}
