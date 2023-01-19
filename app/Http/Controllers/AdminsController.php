<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /*
     * Returns main admin view with all guests.
     */
    public function index()
    {
        $guests = Guest::latest()->paginate(20);
        return view('admin.main')->with([
            'guests' => $guests,
            'mode' => 0
        ]);
    }

    /*
     * Filter guests by confirmed, transport or hotel needed etc.
     */
    public function filterUsers($filter)
    {
        switch ($filter) {
            case 1:
                $guests = Guest::where('confirmed', 1)->latest()->paginate(20);
                break;
            case 2:
                $guests = Guest::where('confirmed', 0)->latest()->paginate(20);
                break;
            case 3:
                $guests = Guest::where('transport', 1)->latest()->paginate(20);
                break;
            case 4:
                $guests = Guest::where('hotel', 1)->latest()->paginate(20);
                break;
            case 5:
                $guests = Guest::where('vege', 1)->latest()->paginate(20);
                break;
            case 6:
                $guests = Guest::where('allergies', '!=', NULL)->latest()->paginate(20);
                break;
        }
        return view('admin.main')->with([
            'guests' => $guests,
            'mode' => $filter
        ]);
    }

    /*
     * Add new guest to guests table.
     */
    public function addGuest(Request $request)
    {
        if (Guest::where('name', $request->name)->where('surname', $request->surname)->count() != 0) {

            $guests = Guest::latest()->paginate(20);
            $error = 'Ta osoba jest na liście';
//            return redirect()->back()->withErrors([
//                $error
//            ]);

            return view('admin.main')->with([
                'guests' => $guests,
                'mode' => 0,
                'error' => 1
            ]);

        } elseif (Guest::where('name', $request->name)->where('surname', $request->surname)->count() == 0) {
            $new_guest = new Guest();

            $new_guest->name = $request->name;
            $new_guest->surname = $request->surname;
            $new_guest->confirmed = 0;
            $new_guest->save();

            $guests = Guest::latest()->paginate(20);
            return view('admin.main')->with([
                'guests' => $guests,
                'mode' => 0,
                'succes' => 1
            ]);
        }
    }

    public function guestProfile($id)
    {
        $guest = Guest::where('id', $id)->first();
        return view('admin.guest')->with(['guest' => $guest]);
    }

    public function searchGuest(Request $request)
    {
        $surname = substr(strstr($request->search," "), 1);
        $name = strtok($request->search, " ");

        $guest = Guest::where('name', 'LIKE', "%$name%")
            ->where('surname', 'LIKE', "%$surname%")
            ->latest()
            ->paginate(20);

        if ($guest->count() == 0) {
            $guests = Guest::latest()->paginate(20);
            return view('admin.main')->with([
                'guests' => $guests,
                'mode' => 0,
                'search' => 0
            ]);
        } else {
            return view('admin.main')->with([
                'guests' => $guest,
                'mode' => 0
            ]);
        }
    }

    public function addConfirmation($id)
    {
        $guest = Guest::where('id', $id)->first();
        $guest->confirmed = 1;
        $guest->save();

        return redirect()->back();
    }

    public function deleteConfirmation($id)
    {
        $guest = Guest::where('id', $id)->first();
        $guest->confirmed = 0;
        $guest->transport = 0;
        $guest->trans_from = NULL;
        $guest->allergies = NULL;
        $guest->hotel = 0;
        $guest->vege = 0;
        $guest->save();

        return redirect()->back();
    }
}
