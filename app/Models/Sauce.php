<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'is_spicy' => 'boolean',
        ];
    }

    public function kebabs()
    {
        return $this->belongsToMany(Kebab::class);
    }
}
