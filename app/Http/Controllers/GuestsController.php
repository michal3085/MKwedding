<?php

namespace App\Http\Controllers;

use App\Exports\GuestExport;
use App\Models\Guest;
use Illuminate\Http\Request;
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

            return view('confirmed')->with([
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
        $guest = Guest::where('id', $id)->first();
        if ($request->hotel == "TAK" ) {
            $guest->hotel = 1;
        } else {
            $guest->hotel = 0;
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


        if (isset($admin)) { // co kolwiek zapisze transport = '1', i from=niepotrzebuje
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
}
