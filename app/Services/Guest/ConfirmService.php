<?php

namespace App\Services\Guest;

use App\Mail\GuestConfirme;
use App\Models\Guest;
use App\Models\UnexpectedGuest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ConfirmService
{
    public function doService($data)
    {
        if (Guest::where('name', $data->name)->where('surname', $data->surname)->where('confirmed', '!=', 1)->count() == 1) {

            $guest = Guest::where('name', $data->name)->where('surname', $data->surname)->first();
            $guest->confirmed = 1;
            $guest->save();

            // Sending confirmation mail
            $emails = User::where('mail_notifications', 1)->get();
            $name = $guest->name . ' ' . $guest->surname;

            foreach ($emails as $email) {
                Mail::to($email->email)
                    ->send(new GuestConfirme($name));
            }

            return $guest;

        } elseif (Guest::where('name', $data->name)->where('surname', $data->surname)->where('confirmed', 1)->count() == 1) {

            $guest = Guest::where('name', $data->name)->where('surname', $data->surname)->first();
            return $guest;
        } else {
            $unexpected = new UnexpectedGuest();
            $unexpected->name = $data->name;
            $unexpected->surname = $data->surname;
            $unexpected->save();

            return 0;
        }
    }
}
