<?php

namespace Database\Seeders;

use App\Models\Kebab;
use Illuminate\Database\Seeder;

class KebabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kebab::factory()->count(100)->create();
    }
}
