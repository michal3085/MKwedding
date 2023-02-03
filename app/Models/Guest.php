<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                $needed = Guest::where('child', 1)->count();
                break;
        }

        $all = Guest::all()->count();
        $result = $needed/$all*100;
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
}
