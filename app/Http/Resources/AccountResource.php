<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            "id" => $this->resource->id,
            "created_at" => $this->resource->created_at,
            "updated_at" => $this->resource->updated_at,
            "title" => $this->resource->title,
            "description" => $this->resource->description,
            "user" => new UserResource($this->whenLoaded("user"))
        ];
    }
}
