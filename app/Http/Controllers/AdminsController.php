<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /*
     * Returns main admin view with all guests.
     */
    public function index() {
        $guests = Guest::latest()->paginate(20);
        return view('admin.main')->with('guests', $guests);
    }

    /*
     * Add new guest to guests table.
     */
    public function addGuest(Request $request) {
        $new_guest = new Guest();

        $new_guest->name    = $request->name;
        $new_guest->surname = $request->surname;
        $new_guest->confirmed = 0;
        $new_guest->save();

        return redirect()->back();
    }
}
