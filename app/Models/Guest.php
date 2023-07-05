<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\s;

class Guest extends Model
{
    use HasFactory;

    public function companion()
    {
        return $this->hasMany('App\Models\Guest');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Child');
    }

    public static function getGuestsPrecentage($mode): int
    {
        switch ($mode) {
            case 1:
                $needed = Guest::where('confirmed', 1)->count();
                break;
            case 2:
                $needed = Guest::where('confirmed', 0)->count();
                break;
            case 3:
                $needed = Guest::where('transport', 1)->where('trans_from', 'Brusów')->count();
                break;
            case 4:
                $needed = Guest::where('transport', 1)->where('trans_from', 'Stalowa Wola')->count();
                break;
            case 5:
                $needed = Guest::where('hotel', 1)->count();
                break;
            case 6:
                $needed = Guest::where('vege', 1)->count();
                break;
            case 7:
                $needed = Guest::where('allergies', '!=', NULL)->count();
                break;
            case 8:
                $needed = Guest::where('child', 1)->where('confirmed', 1)->count();
                break;
        }

        $all = Guest::all()->count();

        $result = $all >= 1 ? $needed / $all * 100 : 0;

        return intval($result);
    }

    public static function guestIsAChild($id): int
    {
        $guest = Guest::where('id', $id)->first();
        if ($guest->child == 1) {
            return 1;
        } else {
            return  0;
        }
    }

    public function changeTransportFrom()
    {
        Guest::where('trans_from', 'Ryki')->update(['trans_from' => 'Brusów']);
    }

    public function newGuest($request)
    {
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
        if ($request->transport != 'Nie potrzebuje') {
            $new_guest->transport  = 1;
            $new_guest->trans_from = $request->trans_from;
        } else {
            $new_guest->transport  = 0;
            $new_guest->trans_from = NULL;
        }
        $new_guest->allergies = $request->allergies;
        $new_guest->hotel = $request->hotel;
        $new_guest->vege  = $request->vege;
        $new_guest->save();
    }

    public static function doIHaveRelatives($id)
    {
        if (Companion::companionExists($id) || Child::doIHaveAChild($id)) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function myRelativesData($id)
    {
        $companion = Companion::getMyCompanionId($id);
        $childrens = Child::where('parent', $id)->orWhere('parent_b', $id)->pluck('child_id');
        $data = $childrens->merge($companion);

        return Guest::whereIn('id', $data)->get();
    }

    public static function myParentsData($id)
    {
        $child = Child::where('child_id', $id)->first();
        $parent_a = Guest::where('id', $child->parent)->pluck('id');
        $parent_b = Guest::where('id', $child->parent_b)->pluck('id');
        $parents = $parent_a->merge($parent_b);

        return Guest::whereIn('id', $parents)->get();

    }

    public static function guestExist($name, $surname)
    {
        if (Guest::where('name', $name)->where('surname', $surname)->count() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function getGuestName($id)
    {
        $data = Guest::where('id', $id)->first();
        return $data->name . ' ' . $data->surname;
    }

    /*
     * Returns 0 if both chose no need hotel,
     * Returns 1 if there are differences in hotel chose by companions,
     * Returns 2 if both need a hotel.
     */
    public static function hotelDifferences($guest, $companion): int
    {
        $data = Guest::whereIn('id', [$guest, $companion])->get();

        if ($data[0]->hotel == 0 && $data[1]->hotel == NULL || $data[0]->hotel == NULL && $data[1]->hotel == 0) {
            return 0;
        } elseif ($data[0]->hotel !== $data[1]->hotel ) {
            return 1;
        } else {
            return 2;
        }
    }

    /*
     * The same returns as hotelDifferences.
     */
    public static function transportDifferences($guest, $companion): int
    {
        $data = Guest::whereIn('id', [$guest, $companion])->get();

        if ($data[0]->transport == 0 && $data[1]->transport == NULL || $data[0]->transport == NULL && $data[1]->transport == 0) {
            return 0;
        } elseif ($data[0]->transport !== $data[1]->transport ) {
            return 1;
        } else {
            if ($data[0]->trans_from !== $data[1]->trans_from) {
                return 1;
            } else {
                return 2;
            }
        }
    }
}
