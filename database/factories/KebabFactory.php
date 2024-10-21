<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kebab>
 */
class KebabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'coordinates_x' => $this->faker->latitude($min = -90, $max = 90),
            'coordinates_y' => $this->faker->longitude($min = -180, $max = 180),
            'opening_year' => $this->faker->optional()->year(),
            'closing_year' => $this->faker->optional()->year(),
            'status' => $this->faker->randomElement(['active', 'inactive', 'planned']),
            'is_kraft' => $this->faker->boolean(),
            'is_food_truck' => $this->faker->boolean(),
            'network' => $this->faker->optional()->company,
            'app_link' => $this->faker->optional()->url,
            'website_link' => $this->faker->optional()->url,
            'has_glovo' => $this->faker->boolean(),
            'has_pyszne' => $this->faker->boolean(),
            'has_ubereats' => $this->faker->boolean(),
            'phone_number' => $this->faker->optional()->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
