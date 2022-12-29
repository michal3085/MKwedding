<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    public function confirmGuest(Request $request)
    {
        if (Guest::where('name', $request->name)->where('surname', $request->surname)->where('confirmed', 0)->count() == 1) {

            $guest = Guest::where('name', $request->name)->where('surname', $request->surname)->first();
            $guest->confirmed = 1;
            $guest->save();
            return view('confirmed');
        } else {
            return 0;
        }
    }

    public function confirmedInfo()
    {
        //
    }
}
