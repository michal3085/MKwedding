<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    public function guests()
    {
        return $this->belongsTo('App\Models\Companion');
    }

    public static function companionExists($id)
    {
        if (Companion::where('companion_a', $id)->orWhere('companion_b', $id)->count() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function getMyCompanionId($my_id)
    {
        $companion = Companion::where('companion_a', $my_id)->orWhere('companion_b', $my_id)->first();

        if ($companion->companion_a == $my_id) {
            return $companion->companion_b;
        } else {
            return $companion->companion_a;
        }
    }

    public static function getNameOfCompanion($my_id)
    {
        $companion = Companion::where('companion_a', $my_id)->orWhere('companion_b', $my_id)->first();
        if ($companion->count() == 0) {
            return 'Brak osoby towarzyszącej.';
        } else {
            if ($companion->companion_a == $my_id) {
                $data = Guest::where('id', $companion->companion_b)->first();
            } else {
                $data = Guest::where('id', $companion->companion_a)->first();
            }

            return $data->name . ' ' . $data->surname;
        }
    }
}
