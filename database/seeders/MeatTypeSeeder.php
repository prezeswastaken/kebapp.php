<?php

namespace Database\Seeders;

use App\Models\MeatType;
use Illuminate\Database\Seeder;

class MeatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meatTypes = [
            'Chicken',
            'Beef',
            'Lamb',
            'Pork',
            'Falafel',
        ];

        $insertData = collect($meatTypes)->map(fn ($meatType) => [
            'name' => $meatType,
            'created_at' => now(),
            'updated_at' => now(),
        ])->toArray();

        MeatType::insert($insertData);
    }
}
