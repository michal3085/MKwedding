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

    public function addGuest(Request $request) {
        //
    }
}
