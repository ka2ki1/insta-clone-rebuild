<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggle(User $user)
    {
        if (Auth::id() === $user->id) {
            abort(403);
        }

        $loginUser = Auth::user();

        if ($loginUser->isFollowing($user)) {
            $loginUser->followings()->detach($user->id);
        } else {
            $loginUser->followings()->attach($user->id);
        }

        return back();
    }
}
