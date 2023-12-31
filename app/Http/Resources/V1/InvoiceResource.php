<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            '_id' => $this->id,
            'amount' => $this-> amount,
            'customerId' => $this-> customer_id,
            'status' => $this->status,
            'billedDate' => $this->billed_date,
            'paidDate' => $this->paid_date,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
