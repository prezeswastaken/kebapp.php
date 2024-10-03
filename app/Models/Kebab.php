<?php

namespace App\Models;

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
        return $this->hasMany(OpeningHoursDay::class);
    }

    public function getOpeningHoursAttribute()
    {
        return $this->openingHours;
    }
}
