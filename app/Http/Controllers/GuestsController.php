<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    /*
     * Prepare data for confirmation view
     */
    public function confirmGuest(Request $request)
    {
        if (Guest::where('name', $request->name)->where('surname', $request->surname)->where('confirmed', 0)->count() == 1) {

            $guest = Guest::where('name', $request->name)->where('surname', $request->surname)->first();
            $guest->confirmed = 1;
            $guest->save();

            return view('confirmed')->with([
                'gid' => $guest->id,
                'name' => $guest->name
                ]);

        } elseif (Guest::where('name', $request->name)->where('surname', $request->surname)->where('confirmed', 1)->count() == 1) {

            $data = Guest::where('name', $request->name)->where('surname', $request->surname)->first();
            return view('confirmed')->with([
                'data' => $data,
                'name' => $data->name,
                'gid' => $data->id
            ]);
        } else {
            return view('confirmed')->with([
                'status' => 'no_guest'
            ]);
        }
    }

    /*
     * Save data from confirmation view and form
     */
    public function guestDataSave(Request $request, $id)
    {
        $guest = Guest::where('id', $id)->first();
        if ($request->hotel == "TAK" ) {
            $guest->hotel = 1;
        } else {
            $guest->hotel = 0;
        }
        if ($request->transport == "Nie potrzebuję") {
            $guest->transport = 0;
        } elseif (!isset($request->transport)) {
            $guest->transport = 0;
        } else {
            $guest->transport = 1;
            $guest->trans_from = $request->transport;
        }
        if ($request->vege == "TAK") {
            $guest->vege = 1;
        } else {
            $guest->vege = 0;
        }
        $guest->allergies = $request->allergies;
        $guest->save();

        return view('confirmed')->with([
            'data' => $guest,
            'gid' => $guest->id,
            'status' => 'data_saved',
            'name' => $guest->name
        ]);
    }

    public function confirmedInfo()
    {
        return view('confirmed');
    }
}
