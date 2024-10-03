<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MeatTypeSeeder::class,
            SauceSeeder::class,
            KebabSeeder::class,
        ]);

        $this->createAdminUser();

        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    private function createAdminUser(): void
    {
        $name = 'admin1';
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);
    }
}
