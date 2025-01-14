<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\UpdateGoogleRatesForAllKebabs;

class FetchGoogleRatesController extends Controller
{
    public function __invoke(UpdateGoogleRatesForAllKebabs $action)
    {
        $action->handle();

        return response()->json(['message' => 'Google rates fetched and updated succesfully!']);
    }
}
