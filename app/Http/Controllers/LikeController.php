<?php

namespace App\Http\Controllers;

use App\Models\AdminLog;
use App\Models\Kebab;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;

class LikeController extends Controller
{
    public function __invoke(Kebab $kebab, #[CurrentUser] User $user)
    {
        $user->likes()->toggle($kebab->id);

        $user->load('likes');
        $user->refresh();

        $logMessage = match ($user->likes->where('id', $kebab->id)->first() != null) {
            true => "Has liked $kebab->name",
            false => "Removed like of $kebab->name",
        };

        AdminLog::create([
            'user_name' => $user->name,
            'method' => 'POST',
            'action_name' => $logMessage,
        ]);

        return response()->json(['message' => $logMessage]);

    }
}
