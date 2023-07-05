<?php

namespace App\Services\Child;

use App\Mail\ChildConfirme;
use App\Mail\ConfirmedBy;
use App\Models\Child;
use App\Models\Companion;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class StoreService
{
    public function doService($child, $id)
    {
        $data = Guest::where('id', $id)->first();
        $guest = Guest::where('name', $child->name)->where('surname', $child->surname)->first();
        $users = User::where('mail_notifications', 1)->get();

        /*
         *  Guest with request credentials exist.
         */
        if ($guest !== NULL) {
            if ( Companion::areWeCompanions($id, $guest->id) ) {
                return view('children')->with([
                    'gid' => $id,
                    'error' => 'child_yours_companion',
                ]);
            }
            if ( Companion::companionExists($guest->id)) {
                return view('children')->with([
                    'gid' => $id,
                    'error' => 'child_someone_companion',
                ]);
            }

            $guest->confirmed = 1;
            $guest->age = $child->age;

            if ($child->age <= 10) {
                $guest->child = 1;
            } else {
                $guest->child = 0;
            }

            $guest->age = $child->age;

            if ($child->transport != 'Nie potrzebuję') {
                $guest->transport  = 1;
                $guest->trans_from = $child->transport;
            } else {
                $guest->transport  = 0;
                $guest->trans_from = NULL;
            }

            $guest->allergies = $child->allergies;

            if (isset($child->hotel)){
                $guest->hotel = $child->hotel;
            }

            $guest->vege  = $child->vege;
            $guest->save();
            Child::newChild($id, $guest->id);

            foreach ($users as $email) Mail::to($email->email)
                ->send(new ConfirmedBy(
                    $guest->name . ' ' . $guest->surname,
                    $data->name . ' ' . $data->surname,
                    1
                ));

            /*
             * Guest with request credentials do not exist.
             */
        } else {

            $new_guest = new Guest();
            $new_guest->name = $child->name;
            $new_guest->surname = $child->surname;
            $new_guest->confirmed = 1;

            if ($child->age <= 10) {
                $new_guest->child = 1;
            } else {
                $new_guest->child = 0;
            }

            $new_guest->age = $child->age;

            if ($child->transport != 'Nie potrzebuję') {
                $new_guest->transport  = 1;
                $new_guest->trans_from = $child->transport;
            } else {
                $new_guest->transport  = 0;
                $new_guest->trans_from = NULL;
            }

            $new_guest->allergies = $child->allergies;
            $new_guest->hotel = $child->hotel;
            $new_guest->vege  = $child->vege;
            $new_guest->save();

            Child::newChild($id, $new_guest->id);

            $children = $new_guest->name . ' ' . $new_guest->surname;
            $name = $data->name . ' ' . $data->surname;

            foreach ($users as $email) {
                Mail::to($email->email)
                    ->send(new ChildConfirme($name, $children));
            }

        }

        return $data;
    }
}
