<?php

namespace App\Http\Controllers;

use App\Models\Kebab;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;

class LikeController extends Controller
{
    public function __invoke(Kebab $kebab, #[CurrentUser] User $user)
    {
        $user->likes()->toggle($kebab->id);
    }
}
