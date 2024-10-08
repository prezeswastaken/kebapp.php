<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminMessageResource extends JsonResource
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
            'user' => $this->user,
            'text' => $this->text,
            'isAccepted' => $this->is_accepted,
            'timeMessage' => $this->getTimeMessage(),
        ];
    }

    private function getTimeMessage(): string
    {
        $now = new \DateTime;
        $messageTime = new \DateTime($this->created_at);
        $interval = $now->diff($messageTime);
        if ($interval->i === 0) {
            return 'Przed chwilą';
        } elseif ($interval->h === 0) {
            return "$interval->i minut temu";
        } elseif ($interval->d > 0) {
            return $interval->d.' dni temu';
        }

        return $interval->h.' hours ago';
    }
}
