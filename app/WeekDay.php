<?php

namespace App;

enum WeekDay: string
{
    case Monday = 'Monday';
    case Tuesday = 'Tuesday';
    case Wednesday = 'Wednesday';
    case Thursday = 'Thursday';
    case Friday = 'Friday';
    case Saturday = 'Saturday';
    case Sunday = 'Sunday';

    public function isWeekend(): bool
    {
        return in_array($this->value, [self::Saturday, self::Sunday]);
    }

    public static function fromInt(int $day): self
    {
        return match ($day) {
            1 => self::Monday,
            2 => self::Tuesday,
            3 => self::Wednesday,
            4 => self::Thursday,
            5 => self::Friday,
            6 => self::Saturday,
            7 => self::Sunday,
            default => throw new \InvalidArgumentException("Invalid day: $day"),
        };
    }

    public static function fromString(string $day): self
    {
        return match (strtolower($day)) {
            'monday' => self::Monday,
            'tuesday' => self::Tuesday,
            'wednesday' => self::Wednesday,
            'thursday' => self::Thursday,
            'friday' => self::Friday,
            'saturday' => self::Saturday,
            'sunday' => self::Sunday,
            default => throw new \InvalidArgumentException("Invalid day: $day"),
        };
    }
}
