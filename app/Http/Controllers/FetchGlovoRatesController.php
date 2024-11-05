<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\UpdateGlovoRatesForAllKebabs;

class FetchGlovoRatesController extends Controller
{
    public function __invoke(UpdateGlovoRatesForAllKebabs $action)
    {
        $action->handle();

        return response()->json(['message' => 'Glovo rates fetched and updated succesfully!']);
    }
}
