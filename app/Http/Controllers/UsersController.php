<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mailNotificationsChange(): \Illuminate\Http\RedirectResponse
    {
        $user = User::where('id', Auth::id())->first();

        if ($user->mail_notifications == 1) {
            $user->mail_notifications = 0;
        } else {
            $user->mail_notifications = 1;
        }
        $user->save();

        return redirect()->back();
    }
}
