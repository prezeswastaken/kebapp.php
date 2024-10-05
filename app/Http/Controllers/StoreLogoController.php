<?php

namespace App\Http\Controllers;

use App\Actions\StoreLogoAction;
use App\Http\Requests\StoreLogoRequest;
use App\Models\Kebab;

class StoreLogoController extends Controller
{
    public function store(StoreLogoRequest $request, Kebab $kebab, StoreLogoAction $action)
    {
        $action->handle($kebab, $request->file('logo'));

        return response()->json(['message' => "Logo for $kebab->name stored successfully"]);
    }
}
