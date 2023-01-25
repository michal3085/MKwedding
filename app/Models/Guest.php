<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    public static function confirmedPrecentage()
    {
        $confirmed = Guest::where('confirmed', 1)->count();
        $all = Guest::all()->count();

        $result = $confirmed/$all*100;
        return intval($result);
    }

    public static function unconfirmedPrecentage()
    {
        $confirmed = Guest::where('confirmed', 0)->count();
        $all = Guest::all()->count();

        $result = $confirmed/$all*100;
        return intval($result);
    }

    public static function transportRyki()
    {
        $confirmed = Guest::where('transport', 1)->where('trans_from', 'Ryki')->count();
        $all = Guest::all()->count();

        $result = $confirmed/$all*100;
        return intval($result);
    }
}
