<?php

namespace Database\Seeders;

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
    }
}
