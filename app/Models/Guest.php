<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    public static function getGuestsPrecentage($mode)
    {
        switch ($mode) {
            case 1:
                $needed = Guest::where('confirmed', 1)->count();
                break;
            case 2:
                $needed = Guest::where('confirmed', 0)->count();
                break;
            case 3:
                $needed = Guest::where('transport', 1)->where('trans_from', 'Ryki')->count();
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
        }

        $all = Guest::all()->count();
        $result = $needed/$all*100;
        return intval($result);
    }
}
