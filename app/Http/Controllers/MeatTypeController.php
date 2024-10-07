<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeatTypeRequest;
use App\Http\Resources\MeatTypeResource;
use App\Models\AdminLog;
use App\Models\MeatType;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;

class MeatTypeController extends Controller
{
    public function __construct(
        #[CurrentUser] private User $user,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MeatTypeResource::collection(MeatType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeatTypeRequest $request)
    {
        $result = MeatType::create($request->validated());

        AdminLog::create([
            'user_name' => $this->user->name,
            'method' => 'POST',
            'action_name' => "Added meat type $result->name",
        ]);

        return response()->json(MeatTypeResource::make($result), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MeatType $meatType)
    {
        return MeatTypeResource::make($meatType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MeatTypeRequest $request, MeatType $meatType)
    {
        $meatType->update($request->validated());
        $meatType->refresh();

        AdminLog::create([
            'user_name' => $this->user->name,
            'method' => 'PUT',
            'action_name' => "Updated meat type $meatType->name",
        ]);

        return response()->json(MeatTypeResource::make($meatType));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeatType $meatType)
    {
        $meatType->delete();

        AdminLog::create([
            'user_name' => $this->user->name,
            'method' => 'DELETE',
            'action_name' => "Deleted meat type $meatType->name",
        ]);

        return response()->json(null, 204);
    }
}
