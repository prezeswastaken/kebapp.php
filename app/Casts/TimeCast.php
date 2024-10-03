<?php

declare(strict_types=1);

namespace App\Casts;

use App\Exceptions\TimeException;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class TimeCast implements CastsAttributes
{
    /**
     * Cast the given value to a Carbon instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  mixed  $value
     */
    public function get($model, string $key, $value, array $attributes): Carbon
    {
        return Carbon::createFromFormat('H:i', $value);
    }

    /**
     * Prepare the Carbon instance for storage as a string in HH:mm format.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  mixed  $value
     */
    public function set($model, string $key, $value, array $attributes): string
    {
        if (! $value instanceof Carbon) {
            try {
                $value = Carbon::createFromFormat('H:i', $value);
            } catch (\Exception $e) {
                throw TimeException::invalid($value);
            }
        }

        return $value->format('H:i');
    }
}
