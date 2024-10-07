<?php

namespace App\Http\Controllers;

use App\DTOs\SauceDTO;
use App\Http\Requests\SauceRequest;
use App\Http\Resources\SauceResource;
use App\Models\AdminLog;
use App\Models\Sauce;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;

class SauceController extends Controller
{
    public function __construct(
        #[CurrentUser] private User $user,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SauceResource::collection(Sauce::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SauceRequest $request)
    {
        $result = Sauce::create(SauceDTO::fromRequest($request)->toCreateArray());

        AdminLog::create([
            'user_name' => $this->user->name,
            'method' => 'POST',
            'action_name' => "Added sauce $result->name",
        ]);

        return response()->json(SauceResource::make($result), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sauce $sauce)
    {
        return SauceResource::make($sauce);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SauceRequest $request, Sauce $sauce)
    {
        $sauce->update(SauceDTO::fromRequest($request)->toCreateArray());
        $sauce->refresh();

        AdminLog::create([
            'user_name' => $this->user->name,
            'method' => 'PUT',
            'action_name' => "Updated sauce $sauce->name",
        ]);

        return response()->json(SauceResource::make($sauce));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sauce $sauce)
    {
        $sauce->delete();

        AdminLog::create([
            'user_name' => $this->user->name,
            'method' => 'DELETE',
            'action_name' => "Deleted sauce $sauce->name",
        ]);

        return response()->json(null, 204);
    }
}
