<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load(['posts' => function ($query) {
            $query->latest();
        }]);

        return view('users.show', compact('user'));
    }
}
