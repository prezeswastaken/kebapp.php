<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user === null || ! $user->is_admin) {
            throw AuthException::adminOnly();
        }

        if ($user->must_change_password) {
            throw AuthException::mustChangePassword();
        }

        return $next($request);
    }
}
