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
}
