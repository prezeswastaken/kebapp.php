<?php

declare(strict_types=1);

namespace App\Casts;

use App\WeekDay;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class WeekDayCast implements CastsAttributes
{
    /**
     * Cast the given value to the WeekDay enum.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  mixed  $value
     */
    public function get($model, string $key, $value, array $attributes): WeekDay
    {
        return WeekDay::fromString($value);
    }

    /**
     * Prepare the WeekDay enum for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  WeekDay  $value
     */
    public function set($model, string $key, $value, array $attributes): string
    {
        if (! $value instanceof WeekDay) {
            try {
                $value = WeekDay::fromString($value);
            } catch (\InvalidArgumentException $e) {
                throw new \InvalidArgumentException('The given value is not a valid WeekDay enum.');
            }
        }

        return $value->value;
    }
}
