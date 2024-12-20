<?php

namespace App\Http\Controllers;

use App\Actions\RegisterUserAction;
use App\Exceptions\AuthException;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, RegisterUserAction $action)
    {

        $validated = $request->validated();

        $token = $action->handle(
            $validated['email'],
            $validated['name'],
            $validated['password'],
        );

        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {

            throw AuthException::unauthorized();
        }

        return $this->respondWithToken($token);

    }

    public function me(#[CurrentUser] User $user)
    {
        $user->load([
            'likes' => function ($query) {
                $query->with(['openingHours', 'likes', 'sauces', 'meatTypes', 'comments.user']);
            },
        ]);

        return UserResource::make($user);
    }

    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'accessToken' => $token,
            'tokenType' => 'bearer',
            'expiresIn' => Auth::factory()->getTTL() * 60,
            'user' => JWTAuth::user(),
        ]);
    }
}
