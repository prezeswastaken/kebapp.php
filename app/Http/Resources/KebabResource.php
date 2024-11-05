<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KebabResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logoUrl' => $this->logo_url,
            'address' => $this->address,
            'coordinatesX' => $this->coordinates_x,
            'coordinatesY' => $this->coordinates_y,
            'openingYear' => $this->opening_year,
            'closingYear' => $this->closing_year,
            'status' => $this->status,
            'isKraft' => $this->is_kraft,
            'isFoodTruck' => $this->is_food_truck,
            'network' => $this->network,
            'appLink' => $this->app_link,
            'websiteLink' => $this->website_link,
            'glovoUrl' => $this->glovo_url,
            'hasGlovo' => $this->has_glovo,
            'hasPyszne' => $this->has_pyszne,
            'hasUberEats' => $this->has_ubereats,
            'phoneNumber' => $this->phone_number,
            'likeCount' => isset($this->likes) ? $this->likes->count() : null,
            'isOpenNow' => $this->whenLoaded('openingHours', $this->isOpenNow()),
            'meatTypes' => MeatTypeResource::collection($this->whenLoaded('meatTypes')),
            'sauces' => SauceResource::collection($this->whenLoaded('sauces')),
            'openingHours' => OpeningHoursDayResource::collection($this->whenLoaded('openingHours')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
