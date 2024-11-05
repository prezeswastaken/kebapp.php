<?php

declare(strict_types=1);

namespace App\Actions;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class FetchGlovoRatesForKebab
{
    public function handle(string $url): int
    {
        try {
            $client = new Client;
            $response = $client->get($url);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Failed to retrieve the page');
            }

            $htmlContent = $response->getBody()->getContents();

            $crawler = new Crawler($htmlContent);

            $element = $crawler->filter('[data-test-id="store-rating-label"]')->first();

            if ($element->count()) {
                $text = $element->text();
                $rate = intval(explode('%', $text)[0]);

                return $rate;
            } else {
                dd('Element with data-test-id="store-rating-label" not found');
            }

        } catch (\Exception $e) {
            // Handle exceptions or return null if there's an error
            return dd($e->getMessage());
        }
    }
}
