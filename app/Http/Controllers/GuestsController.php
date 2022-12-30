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

            return view('confirmed')->with([
                'gid' => $guest->id
                ]);

        } elseif (Guest::where('name', $request->name)->where('surname', $request->surname)->where('confirmed', 1)->count() == 1) {

            $data = Guest::where('name', $request->name)->where('surname', $request->surname)->first();
            return view('confirmed')->with([
                'data' => $data,
                'gid' => $data->id
            ]);
        }
    }

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
            'status' => 'data_saved'
        ]);
    }

    public function confirmedInfo()
    {
        return view('confirmed');
    }
}
