<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    public function guest()
    {
        return $this->belongsTo('App\Model\Guest');
    }

    public static function doIhaveAChild($id): int
    {
        $child = Child::where('parent', $id)->orWhere('parent_b', $id)->first();

        if ($child->count() == 1) {
            return 1;
        } elseif ($child->count() > 1) {
            return 2;
        } else {
            return 0;
        }
    }
}
