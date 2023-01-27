<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\Guest;
use Illuminate\Http\Request;

class CompanionController extends Controller
{
    public function addCompanion($id)
    {
        $data = Guest::where('id', $id)->first();

        return view('companion')->with([
            'data' => $data,
            'name' => $data->name,
            'surname' => $data->surname,
            'gid' => $data->id
        ]);
    }

    public function showCompanionData($id)
    {
        //
    }

    public function saveCompanion(Request $request, $id)
    {
        $data = Guest::where('id', $id)->first();

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

                return view('confirmed')->with([
                    'data' => $data,
                    'name' => $data->name,
                    'surname' => $data->surname,
                    'gid' => $data->id,
                    'status' => 'companion_added'
                ]);
            }
        } elseif (Guest::where('name', $request->name)->where('surname', $request->surname)->count() == 1) {

            $check = Guest::where('name', $request->name)->where('surname', $request->surname)->first();
            $companion = Companion::where('companion_a', $check->id)->orWhere('companion_b', $check->id)->first();
            if ($companion !== NULL) {
                if ($companion->companion_a == $id) {
                    $second_one = $companion->companion_b;
                } else {
                    $second_one = $companion->companion_a;
                }
                /*
                 * User exists, and it's yours companion, so lets update the credentials.
                 */
                if (Companion::where([['companion_a', '=', $second_one], ['companion_b', '=', $id]])->orWhere([['companion_a', '=', $id], ['companion_b', '=', $second_one]])->count() == 1) {
                    $companion->confirmed = 1;
                    $companion->child = 0;
                    $companion->name = $request->name;
                    $companion->surname = $request->surname;
                    $companion->hotel = $request->hotel;

                    if ($request->transport == "Nie potrzebuję") {
                        $companion->transport = 0;
                        $companion->trans_from = NULL;
                    } elseif (!isset($request->transport)) {
                        $companion->transport = 0;
                        $companion->trans_from = NULL;
                    } else {
                        $companion->transport = 1;
                        $companion->trans_from = $request->transport;
                    }
                    $companion->vege = $request->vege;
                    $companion->allergies = $request->allergies;
                    $companion->save();
                    return view('confirmed')->with([
                        'data' => $data,
                        'name' => $data->name,
                        'surname' => $data->surname,
                        'gid' => $data->id,
                        'status' => 'companion_added'
                    ]);
                /*
                 * User exists in DB and have a companion already.
                 */
                } else {
                    return view('confirmed')->with([
                        'data' => $data,
                        'name' => $data->name,
                        'surname' => $data->surname,
                        'gid' => $data->id,
                        'status' => 'companion_not_yours'
                    ]);
                }
                /*
                 *  User exists in our database, and is not a companion to someone.
                 */
            } else {
                $check->confirmed = 1;
                $check->child = 0;
                $check->name = $request->name;
                $check->surname = $request->surname;
                $check->hotel = $request->hotel;

                if ($request->transport == "Nie potrzebuję") {
                    $check->transport = 0;
                    $check->trans_from = NULL;
                } elseif (!isset($request->transport)) {
                    $check->transport = 0;
                    $check->trans_from = NULL;
                } else {
                    $check->transport = 1;
                    $check->trans_from = $request->transport;
                }
                $check->vege = $request->vege;
                $check->allergies = $request->allergies;
                $check->save();

                $new_companion = new Companion();
                $new_companion->companion_a = $id;
                $new_companion->companion_b = $check->id;
                $new_companion->save();

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
