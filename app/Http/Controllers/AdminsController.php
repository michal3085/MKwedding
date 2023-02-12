<?php

namespace App\Http\Controllers;

use App\Exports\GuestExport;
use App\Models\BrideAndGroom;
use App\Models\Child;
use App\Models\Companion;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

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
            case 7:
                $guests = Guest::where('child', 1)->latest()->paginate(20);
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
            return redirect()->back()->withErrors([
                $error
            ]);

        } elseif (Guest::where('name', $request->name)->where('surname', $request->surname)->count() == 0) {
            $new_guest = new Guest();

            $new_guest->name = $request->name;
            $new_guest->surname = $request->surname;
            $new_guest->confirmed = 0;
            $new_guest->child = $request->child;
            $new_guest->save();

            $guests = Guest::latest()->paginate(20);
            return redirect()->back()->with([
                'guests' => $guests,
                'mode' => 0,
                'success' => 1
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

        if ($guest->count() >= 1) {
            return view('admin.main')->with([
                'guests' => $guest,
                'mode' => 0,
                'search' => 1
            ]);
        } elseif ($guest->count() == 0) {
            $search = Guest::where('surname', 'LIKE', '%' . $surname . '%')->paginate(20);
            $guests = Guest::latest()->paginate(20);

            if ($search->count() >= 1) {
                $result = $search;
                $found = 1;
            } elseif ($search->count() == 0) {
                $result = $guests;
                $found = 0;
            }
            return view('admin.main')->with([
                'guests' => $result,
                'mode' => 0,
                'search' => $found
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

    public function deleteConfirmation($id, $with_all = NULL)
    {
        $guest = Guest::where('id', $id)->first();
        $guest->confirmed = 0;
        $guest->transport = 0;
        $guest->trans_from = NULL;
        $guest->allergies = NULL;
        $guest->hotel = 0;
        $guest->vege = 0;
        $guest->save();

        if (isset($with_all)) {
            if (Companion::companionExists($id)) {
                //$companion = Companion::where('companion_a', Companion::getMyCompanionId($id))->orWhere('companion_b', Companion::getMyCompanionId($id))->first();
                Guest::where('id', Companion::getMyCompanionId($id))->update(['confirmed' => 0]);
            }
            if (Child::doIHaveAChild($id)) {
                $childs = Child::getChildrensData($id);
                foreach ($childs as $child) {
                    Guest::where('id', $child->id)->update(['confirmed' => 0]);
                }
            }
        }

        return redirect()->back();
    }

    public function brideAndGroom()
    {
        $brideAndGroom = BrideAndGroom::first();

        return view('admin.bride_and_groom')->with('data', $brideAndGroom);
    }

    public function brideAndGroomDataSave(Request $request)
    {
        if (BrideAndGroom::all()->count() == 0) {
            $brideAndGroom = new BrideAndGroom();
            $brideAndGroom->bride = $request->bride;
            $brideAndGroom->groom = $request->groom;
            $brideAndGroom->bride_after = $request->bride_after;
            $brideAndGroom->bride_from = $request->bride_from;
            $brideAndGroom->groom_from = $request->groom_from;
            $brideAndGroom->bride_phone = $request->bride_phone;
            $brideAndGroom->groom_phone = $request->groom_phone;

            $brideAndGroom->save();
        } else {
            BrideAndGroom::where('bride', '!=', NULL)->update([
                'bride' => $request->bride,
                'groom' => $request->groom,
                'bride_after' => $request->bride_after,
                'bride_from' => $request->bride_from,
                'groom_from' => $request->groom_from,
                'bride_phone' => $request->bride_phone,
                'groom_phone' => $request->groom_phone,
            ]);
        }
        return redirect()->back();
    }
}
