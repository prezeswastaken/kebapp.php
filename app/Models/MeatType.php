<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeatType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kebabs()
    {
        return $this->belongsToMany(Kebab::class);
    }
}
