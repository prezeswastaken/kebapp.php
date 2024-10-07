<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminLogResource extends JsonResource
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
            'userName' => $this->user_name,
            'method' => $this->method,
            'actionName' => $this->action_name,
            'creationHour' => Carbon::parse($this->created_at)->format('H:i'),
            'creationDate' => Carbon::parse($this->created_at)->format('d-m-Y'),

        ];
    }
}
