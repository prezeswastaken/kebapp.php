<?php

declare(strict_types=1);

namespace App\Actions;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class FetchPyszneRatesForKebab
{
    public function handle(string $url)
    {
        try {
            // Create a Guzzle client to fetch the URL content
            $client = new Client;
            $response = $client->get($url);

            // Check if the response status is OK
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Failed to retrieve the page');
            }

            // Get the HTML content of the page
            $htmlContent = $response->getBody()->getContents();

            // Use Symfony's Crawler to parse the HTML content
            $crawler = new Crawler($htmlContent);

            // Search for the div with data-qa="restaurant-header-score" and its <b> child
            $element = $crawler->filter('[data-qa="restaurant-header-score"] b')->first();

            // If found, return the content; otherwise, indicate it was not found
            if ($element->count()) {
                return $element->text();
            } else {
                dd('Element with data-qa="restaurant-header-score" and <b> child not found');
            }

        } catch (\Exception $e) {
            // Handle exceptions or return null if there's an error
            return dd($e->getMessage());
        }
    }
}
