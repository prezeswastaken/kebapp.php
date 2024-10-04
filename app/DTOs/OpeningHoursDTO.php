<?php

declare(strict_types=1);

namespace App\DTOs;

class OpeningHoursDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly int $kebabId,
        private readonly array $days,
    ) {}

    public static function make(array $request, int $kebabId): self
    {
        $days = self::parseDays($request);

        return new self(
            $kebabId,
            $days,
        );
    }

    public function toCreateArray(): array
    {
        $data = collect($this->days)->map(function ($day) {
            return [
                'week_day' => $day['week_day'],
                'opens_at' => $day['opens_at'],
                'closes_at' => $day['closes_at'],
                'kebab_id' => $this->kebabId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        return $data;
    }

    private static function parseDays(array $request): array
    {
        $days = [
            [
                'week_day' => 'monday',
                'opens_at' => $request['mondayOpensAt'],
                'closes_at' => $request['mondayClosesAt'],
            ],
            [
                'week_day' => 'tuesday',
                'opens_at' => $request['tuesdayOpensAt'] ?? $request['mondayOpensAt'],
                'closes_at' => $request['tuesdayClosesAt'] ?? $request['mondayClosesAt'],
            ],
            [
                'week_day' => 'wednesday',
                'opens_at' => $request['wednesdayOpensAt'] ?? $request['mondayOpensAt'],
                'closes_at' => $request['wednesdayClosesAt'] ?? $request['mondayClosesAt'],
            ],
            [
                'week_day' => 'thursday',
                'opens_at' => $request['thursdayOpensAt'] ?? $request['mondayOpensAt'],
                'closes_at' => $request['thursdayClosesAt'] ?? $request['mondayClosesAt'],
            ],
            [
                'week_day' => 'friday',
                'opens_at' => $request['fridayOpensAt'] ?? $request['mondayOpensAt'],
                'closes_at' => $request['fridayClosesAt'] ?? $request['mondayClosesAt'],
            ],
            [
                'week_day' => 'saturday',
                'opens_at' => $request['saturdayOpensAt'] ?? $request['mondayOpensAt'],
                'closes_at' => $request['saturdayClosesAt'] ?? $request['mondayClosesAt'],
            ],
            [
                'week_day' => 'sunday',
                'opens_at' => $request['sundayOpensAt'] ?? $request['mondayOpensAt'],
                'closes_at' => $request['sundayClosesAt'] ?? $request['mondayClosesAt'],
            ],
        ];

        return $days;
    }
}
