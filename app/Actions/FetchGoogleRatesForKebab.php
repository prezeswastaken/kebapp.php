<?php

declare(strict_types=1);

namespace App\Actions;

use Http;

class FetchGoogleRatesForKebab
{
    public function __construct(
    ) {}

    public function handle(string $name): float
    {
        $key = config('services.google.key');
        $body = ['textQuery' => "$name legnica"];
        $url = 'https://places.googleapis.com/v1/places:searchText';
        $headers = [
            'X-Goog-Api-Key' => $key,
            'X-Goog-FieldMask' => 'places.rating',
        ];
        $response = Http::withHeaders($headers)->withBody(json_encode($body))->post($url);
        if (! isset($response->json()['places'])) {
            return 0;
        } elseif (! isset($response->json()['places'][0])) {
            return 0;
        } elseif (! isset($response->json()['places'][0]['rating'])) {
            return 0;
        }
        /** @var string $rating */
        $rating = $response->json()['places'][0]['rating'];
        $rating = floatval($rating);

        return $rating;
    }
}
