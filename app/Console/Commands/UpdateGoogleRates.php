<?php

namespace App\Console\Commands;

use App\Actions\UpdateGoogleRatesForAllKebabs;
use Illuminate\Console\Command;

use function Laravel\Prompts\spin;

class UpdateGoogleRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:google';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches and updates google rates for all kebabs';

    /**
     * Execute the console command.
     */
    public function handle(UpdateGoogleRatesForAllKebabs $action)
    {
        $this->info('Started fetching ...');
        spin(function () use ($action) {
            $action->handle();
        }, 'Fetching...');
        $this->info('Google rates fetched and updated succesfully!');
    }
}
