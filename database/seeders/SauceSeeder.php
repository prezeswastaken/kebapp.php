<?php

namespace Database\Seeders;

use App\Models\Sauce;
use Illuminate\Database\Seeder;

class SauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sauces = [
            ['name' => 'Mild', 'is_spicy' => false],
            ['name' => 'Garlic', 'is_spicy' => false],
            ['name' => 'Spicy', 'is_spicy' => true],
            ['name' => 'Mixed', 'is_spicy' => true],
        ];

        $insertData = collect($sauces)->map(fn ($sauce) => [
            'name' => $sauce['name'],
            'is_spicy' => $sauce['is_spicy'],
            'created_at' => now(),
            'updated_at' => now(),
        ])->toArray();

        Sauce::insert($insertData);
    }
}
