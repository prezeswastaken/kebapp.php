<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OpeningHoursDayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'weekDay' => $this->week_day,
            'opensAt' => Carbon::parse($this->opens_at)->format('H:i'),
            'closesAt' => Carbon::parse($this->closes_at)->format('H:i'),
        ];
    }
}
