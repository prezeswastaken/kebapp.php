<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SortKebabsTest extends TestCase
{
    use RefreshDatabase;

    public function test_sorting_kebabs_by_name(): void
    {
        $response = $this->get('/api/kebabs?orderBy=name');

        $response->assertStatus(200);

        $kebabs = $response->json();

        $sorted = collect($kebabs)->sortBy('name');

        $this->assertEquals($sorted->first()['id'], $kebabs['0']['id']);
        $this->assertEquals($sorted->last()['id'], $kebabs[count($kebabs) - 1]['id']);
    }

    public function test_sorting_kebabs_by_name_desc(): void
    {
        $response = $this->get('/api/kebabs?orderByDesc=name');

        $response->assertStatus(200);

        $kebabs = $response->json();

        $sorted = collect($kebabs)->sortByDesc('name');

        $this->assertEquals($sorted->first()['id'], $kebabs['0']['id']);
        $this->assertEquals($sorted->last()['id'], $kebabs[count($kebabs) - 1]['id']);
    }

    public function test_sorting_kebabs_by_opening_year(): void
    {
        $response = $this->get('/api/kebabs?orderBy=openingYear');

        $response->assertStatus(200);

        $kebabs = $response->json();

        $sorted = collect($kebabs)->sortBy('openingYear');

        $this->assertEquals($sorted->first()['id'], $kebabs['0']['id']);
        $this->assertEquals($sorted->last()['id'], $kebabs[count($kebabs) - 1]['id']);
    }

    public function test_sorting_kebabs_by_opening_year_desc(): void
    {
        $response = $this->get('/api/kebabs?orderByDesc=openingYear');

        $response->assertStatus(200);

        $kebabs = $response->json();

        $sorted = collect($kebabs)->sortByDesc('openingYear');

        $this->assertEquals($sorted->first()['id'], $kebabs['0']['id']);
        $this->assertEquals($sorted->last()['id'], $kebabs[count($kebabs) - 1]['id']);
    }

    public function test_sorting_kebabs_by_closing_year(): void
    {
        $response = $this->get('/api/kebabs?orderBy=closingYear');

        $response->assertStatus(200);

        $kebabs = $response->json();

        $sorted = collect($kebabs)->sortBy('closingYear');

        $this->assertEquals($sorted->first()['id'], $kebabs['0']['id']);
        $this->assertEquals($sorted->last()['id'], $kebabs[count($kebabs) - 1]['id']);
    }

    public function test_sorting_kebabs_by_closing_year_desc(): void
    {
        $response = $this->get('/api/kebabs?orderByDesc=closingYear');

        $response->assertStatus(200);

        $kebabs = $response->json();

        $sorted = collect($kebabs)->sortByDesc('closingYear');

        $this->assertEquals($sorted->first()['id'], $kebabs['0']['id']);
        $this->assertEquals($sorted->last()['id'], $kebabs[count($kebabs) - 1]['id']);
    }
}
