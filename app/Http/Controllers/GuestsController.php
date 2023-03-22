<?php

namespace App\Http\Controllers;

use App\Exports\GuestExport;
use App\Http\Requests\StoreGuestRequest;
use App\Mail\GuestConfirme;
use App\Models\Child;
use App\Models\Companion;
use App\Models\Guest;
use App\Models\UnexpectedGuest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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

            // Sending confirmation mail
            $emails = User::all();
            $name = $guest->name . ' ' . $guest->surname;

            foreach ($emails as $email) {
                Mail::to($email->email)
                    ->send(new GuestConfirme($name));
            }

            return view('confirmed')->with([
                'data' => $guest,
                'gid' => $guest->id,
                'name' => $guest->name,
                'surname' => $guest->surname
                ]);

        } elseif (Guest::where('name', $request->name)->where('surname', $request->surname)->where('confirmed', 1)->count() == 1) {

            $data = Guest::where('name', $request->name)->where('surname', $request->surname)->first();
            return view('confirmed')->with([
                'data' => $data,
                'name' => $data->name,
                'surname' => $data->surname,
                'gid' => $data->id
            ]);
        } else {
            $unexpected = new UnexpectedGuest();
            $unexpected->name = $request->name;
            $unexpected->surname = $request->surname;
            $unexpected->save();

            return view('confirmed')->with([
                'status' => 'no_guest'
            ]);
        }
    }

    /*
     * Export all guests from data base to excel file.
     */
    public function exportToExcel()
    {
        return Excel::download(new GuestExport(), 'lista_gosci.xlsx');
    }

    /*
     * Save data from confirmation view and form
     */
    public function guestDataSave(Request $request, $id, $admin = NULL)
    {
        $request->validate([
           'allergies' => 'max:320'
        ]);
        $guest = Guest::where('id', $id)->first();
        if (isset($request->hotel)) {
            if ($request->hotel == "TAK" ) {
                $guest->hotel = 1;
            } else {
                $guest->hotel = 0;
            }
        }
        if ($request->transport == "Nie potrzebuję") {
            $guest->transport = 0;
            $guest->trans_from = NULL;
        } elseif (!isset($request->transport)) {
            $guest->transport = 0;
            $guest->trans_from = NULL;
        } else {
            $guest->transport = 1;
            $guest->trans_from = $request->transport;
        }
        if ($request->vege == "TAK") {
            $guest->vege = 1;
        } else {
            $guest->vege = 0;
        }
        if (isset($request->allergies)) {
            $guest->allergies = $request->allergies;
        }
        if ($request->child == NULL) {
            $request->child == $guest->child;
        } else {
            $guest->child = $request->child;
        }
        if (isset($request->age) && $request->age <= 10) {
            $guest->age = $request->age;
            $guest->child = 1;
        } elseif (isset($request->age) && $request->age >= 11) {
            $guest->age = $request->age;
            $guest->child = 0;
        }

        if (isset($admin)) {
            $guest->name = $request->name;
            $guest->surname = $request->surname;
            $guest->save();

            return view('admin.guest')->with(['guest' => $guest]);
        } else {
            $guest->save();
            return view('confirmed')->with([
                'data' => $guest,
                'gid' => $guest->id,
                'status' => 'data_saved',
                'name' => $guest->name
            ]);
        }
    }

    public function confirmedInfo()
    {
        return view('confirmed');
    }

    public function unexpectedGuests()
    {
        $data = UnexpectedGuest::latest()->paginate(20);
        return view('admin.unexpecteds')->with('guests', $data);
    }

    /*
     * It removes the guest from the wedding list and cancels the confirmation of his relatives' attendance.
     */
    public function deleteGuest($id)
    {
        if (Guest::doIHaveRelatives($id)) {
            $relatives = Guest::myRelativesData($id);
            foreach ($relatives as $relative) {
                Guest::where('id', $relative->id)->update(['confirmed' => 0]);
            }
            /*
             *  changeAndDeleteParents
             *  A deleted user is removed from a column in the Children table
             *  if its ID is in the parent column - the ID from parent_b is moved
             *  to its place and parent_b takes the result NULL.
             */
            Child::changeAndDeleteParents($id);
        }
        Companion::where('companion_a', $id)->orWhere('companion_b', $id)->delete();
        Guest::where('id', $id)->delete();

        $guests = Guest::latest()->paginate(20);
        return view('admin.main')->with([
            'guests' => $guests,
            'mode' => 0
        ]);
    }
}
