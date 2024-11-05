<?php

namespace App\Console\Commands;

use App\Actions\UpdateGlovoRatesForAllKebabs;
use Illuminate\Console\Command;

use function Laravel\Prompts\spin;

class UpdateGlovoRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:glovo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches and updates glovo rates for all kebabs which have glovo_url set';

    /**
     * Execute the console command.
     */
    public function handle(UpdateGlovoRatesForAllKebabs $action)
    {
        $this->info('Started fetching ...');
        spin(function () use ($action) {
            $action->handle();
        }, 'Fetching...');
        $this->info('Glovo rates fetched and updated succesfully!');
    }
}
