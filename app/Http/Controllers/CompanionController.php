<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\Guest;
use Illuminate\Http\Request;

class CompanionController extends Controller
{
    public function addCompanion($name, $surname)
    {
        $data = Guest::where('name', $name)->where('surname', $surname)->first();

        return view('companion')->with([
            'data' => $data,
            'name' => $name,
            'surname' => $surname,
            'gid' => $data->id
        ]);
    }

    public function saveCompanion(Request $request, $id)
    {
        if (Guest::where('name', $request->name)->where('surname', $request->surname)->count() == 0) {
            $new_guest = new Guest();
            $new_guest->confirmed = 1;
            $new_guest->child = 0;
            $new_guest->name = $request->name;
            $new_guest->surname = $request->surname;
            $new_guest->hotel = $request->hotel;

            if ($request->transport == "Nie potrzebuję") {
                $new_guest->transport = 0;
                $new_guest->trans_from = NULL;
            } elseif (!isset($request->transport)) {
                $new_guest->transport = 0;
                $new_guest->trans_from = NULL;
            } else {
                $new_guest->transport = 1;
                $new_guest->trans_from = $request->transport;
            }
            $new_guest->vege = $request->vege;
            $new_guest->allergies = $request->allergies;

            if ($new_guest->save()) {
                $companion = new Companion();
                $companion->companion_a = $id;
                $companion->companion_b = $new_guest->id;
                $companion->save();

                $data = Guest::where('id', $id)->first();
                return view('confirmed')->with([
                    'data' => $data,
                    'name' => $data->name,
                    'surname' => $data->surname,
                    'gid' => $data->id,
                    'status' => 'companion_added'
                ]);
            }
        }
    }
}
