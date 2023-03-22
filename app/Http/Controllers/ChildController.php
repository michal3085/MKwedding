<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildRequest;
use App\Mail\ChildConfirme;
use App\Models\Child;
use App\Models\Companion;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;

class ChildController extends Controller
{
    public function addChild($id)
    {
        return view('children')->with([
            'gid' => $id
        ]);
    }

    public function saveChild(StoreChildRequest $request, $id)
    {
        $data = Guest::where('id', $id)->first();
        $guest = Guest::where('name', $request->name)->where('surname', $request->surname)->first();
        /*
         *  Guest with request credentials exist.
         */
        if ($guest !== NULL) {
            if ( Companion::areWeCompanions($id, $guest->id) ) {
                return view('children')->with([
                    'gid' => $id,
                    'error' => 'child_yours_companion'
                ]);
            }
            if ( Companion::companionExists($guest->id)) {
                return view('children')->with([
                    'gid' => $id,
                    'error' => 'child_someone_companion'
                ]);
            }

            $guest->confirmed = 1;
            $guest->age = $request->age;
            if ($request->age <= 10) {
                $guest->child = 1;
            } else {
                $guest->child = 0;
            }
            $guest->age = $request->age;
            if ($request->transport != 'Nie potrzebuję') {
                $guest->transport  = 1;
                $guest->trans_from = $request->transport;
            } else {
                $guest->transport  = 0;
                $guest->trans_from = NULL;
            }
            $guest->allergies = $request->allergies;
            if (isset($request->hotel)){
                $guest->hotel = $request->hotel;
            }
            $guest->vege  = $request->vege;
            $guest->save();
            Child::newChild($id, $guest->id);

            /*
             * Guest with request credentials do not exist.
             */
        } else {
            $new_guest = new Guest();
            $new_guest->name = $request->name;
            $new_guest->surname = $request->surname;
            $new_guest->confirmed = 1;

            if ($request->age <= 10) {
                $new_guest->child = 1;
            } else {
                $new_guest->child = 0;
            }
            $new_guest->age = $request->age;
            if ($request->transport != 'Nie potrzebuję') {
                $new_guest->transport  = 1;
                $new_guest->trans_from = $request->transport;
            } else {
                $new_guest->transport  = 0;
                $new_guest->trans_from = NULL;
            }
            $new_guest->allergies = $request->allergies;
            $new_guest->hotel = $request->hotel;
            $new_guest->vege  = $request->vege;
            $new_guest->save();
            Child::newChild($id, $new_guest->id);

            $emails = User::all();
            $name = $data->name . ' ' . $data->surname;
            $children = $new_guest->name . ' ' . $new_guest->surname;

            foreach ($emails as $email) {
                Mail::to($email->email)
                    ->send(new ChildConfirme($name, $children));
            }

        }

        return view('confirmed')->with([
            'data' => $data,
            'name' => $data->name,
            'surname' => $data->surname,
            'gid' => $data->id,
            'status' => 'child_added'
        ]);
    }

    public function showChildren($child_id)
    {
        $children = Guest::where('id', $child_id)->first();

        $data = Guest::where('id', $children->id)->first();
        return view('confirmed')->with([
            'data' => $data,
            'name' => $data->name,
            'surname' => $data->surname,
            'gid' => $data->id,
        ]);
    }
}
