<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilterKebabsTest extends TestCase
{
    use RefreshDatabase;

    public function test_filtering_by_sauce(): void
    {
        $response = $this->get('/api/kebabs?sauces=Mild');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return collect($kebab['sauces'])
                ->where('name', 'Mild')->first() !== null;
        }));

        $response = $this->get('/api/kebabs?sauces=Mild,Garlic');
        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return collect($kebab['sauces'])
                ->where('name', 'Mild')->first() !== null ||
                collect($kebab['sauces'])
                    ->where('name', 'Garlic')->first() !== null;
        }));

        $response->assertStatus(200);
    }

    public function test_filtering_by_meat_types(): void
    {
        $response = $this->get('/api/kebabs?meatTypes=Chicken');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return collect($kebab['meatTypes'])
                ->where('name', 'Chicken')->first() !== null;
        }));
    }

    public function test_filtering_by_status(): void
    {
        $response = $this->get('/api/kebabs?statuses=active');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['status'] === 'active';
        }));
    }

    public function test_filtering_by_is_kraft(): void
    {
        $response = $this->get('/api/kebabs?isKraft=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['isKraft'] === true;
        }));
    }

    public function test_filtering_by_is_food_truck(): void
    {
        $response = $this->get('/api/kebabs?isFoodTruck=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['isFoodTruck'] === true;
        }));
    }

    public function test_filtering_by_has_glovo(): void
    {
        $response = $this->get('/api/kebabs?hasGlovo=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['hasGlovo'] === true;
        }));
    }

    public function test_filtering_by_has_pyszne(): void
    {
        $response = $this->get('/api/kebabs?hasPyszne=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['hasPyszne'] === true;
        }));
    }

    public function test_filtering_by_has_uber_eats(): void
    {
        $response = $this->get('/api/kebabs?hasUberEats=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['hasUberEats'] === true;
        }));
    }

    public function test_filtering_by_has_phone(): void
    {
        $response = $this->get('/api/kebabs?hasPhone=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return ! is_null($kebab['phoneNumber']);
        }));

        $response = $this->get('/api/kebabs?hasPhone=false');
        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return is_null($kebab['phoneNumber']);
        }));
    }

    public function test_filtering_by_has_website(): void
    {
        $response = $this->get('/api/kebabs?hasWebsite=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return ! is_null($kebab['websiteLink']);
        }));

        $response = $this->get('/api/kebabs?hasWebsite=false');
        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return is_null($kebab['websiteLink']);
        }));
    }

    public function test_filtering_by_has_network(): void
    {
        $response = $this->get('/api/kebabs?hasNetwork=true');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return ! is_null($kebab['network']);
        }));

        $response = $this->get('/api/kebabs?hasNetwork=false');
        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return is_null($kebab['network']);
        }));
    }

    public function test_filtering_by_is_kraft_false(): void
    {
        $response = $this->get('/api/kebabs?isKraft=false');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['isKraft'] === false;
        }));
    }

    public function test_filtering_by_is_food_truck_false(): void
    {
        $response = $this->get('/api/kebabs?isFoodTruck=false');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['isFoodTruck'] === false;
        }));
    }

    public function test_filtering_by_has_glovo_false(): void
    {
        $response = $this->get('/api/kebabs?hasGlovo=false');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['hasGlovo'] === false;
        }));
    }

    public function test_filtering_by_has_pyszne_false(): void
    {
        $response = $this->get('/api/kebabs?hasPyszne=false');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['hasPyszne'] === false;
        }));
    }

    public function test_filtering_by_has_uber_eats_false(): void
    {
        $response = $this->get('/api/kebabs?hasUberEats=false');

        $response->assertStatus(200);

        $kebabs = $response->json();
        $this->assertTrue(collect($kebabs)->every(function ($kebab) {
            return $kebab['hasUberEats'] === false;
        }));
    }
}
