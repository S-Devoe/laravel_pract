<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'id' => $this -> id,
            'name' => $this -> name,
            'type'=> $this -> type,
            'email' => $this -> email,
            'address' => $this -> address,
            'postalCode' => $this -> postal_code,
            'city' => $this -> city,
            'state' => $this -> state,
            'createdAt' => $this -> created_at,
            'updatedAt' => $this -> updated_at,
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices')),
        ];
    }
}
