<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthException;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Hash;
use Illuminate\Container\Attributes\CurrentUser;

class UpdatePasswordController extends Controller
{
    public function __invoke(UpdatePasswordRequest $request, #[CurrentUser] User $user)
    {
        $oldPassword = $request->input('oldPassword');
        $newPassword = $request->input('newPassword');

        if (! Hash::check($oldPassword, $user->password)) {
            throw AuthException::incorrectOldPassword();
        }

        $newPasswordHash = Hash::make($newPassword);
        $user->update([
            'password' => $newPasswordHash,
            'must_change_password' => false,
        ]);

        return response()->json(['message' => 'Password updated succesfully!'], 200);
    }
}
