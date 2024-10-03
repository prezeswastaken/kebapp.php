<?php

namespace App\Models;

use App\Casts\TimeCast;
use App\Casts\WeekDayCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHoursDay extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'week_day' => WeekDayCast::class,
            'opens_at' => TimeCast::class,
            'closes_at' => TimeCast::class,
        ];
    }

    public function kebab()
    {
        return $this->belongsTo(Kebab::class);
    }
}
