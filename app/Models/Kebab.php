<?php

namespace App\Models;

use App\Casts\KebabStatusCast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebab extends Model
{
    use HasFactory;

    protected function casts(): array
    {

        return [

            'is_kraft' => 'boolean',
            'is_food_truck' => 'boolean',
            'status' => KebabStatusCast::class,
            'has_glovo' => 'boolean',
            'has_pyszne' => 'boolean',
            'has_ubereats' => 'boolean',

        ];

    }

    protected $guarded = [];

    public function meatTypes()
    {
        return $this->belongsToMany(MeatType::class);
    }

    public function sauces()
    {
        return $this->belongsToMany(Sauce::class);
    }

    public function openingHours()
    {
        return $this->hasMany(OpeningHoursDay::class, 'kebab_id', 'id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isOpenNow()
    {
        $now = Carbon::now('Europe/Warsaw');
        $currentWeekDay = strtolower($now->format('l'));
        $todayHours = $this->openingHours()->where('week_day', $currentWeekDay)->first();

        if (! $todayHours) {
            return false;
        }

        $opensAt = Carbon::createFromTimeString($todayHours->opens_at, 'Europe/Warsaw');
        $closesAt = Carbon::createFromTimeString($todayHours->closes_at, 'Europe/Warsaw');

        if ($todayHours->closes_at === '00:00') {
            $closesAt = $closesAt->endOfDay();
        }

        return $now->between($opensAt, $closesAt);
    }
}
