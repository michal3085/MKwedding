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

    /*
     * If child exist in Guests table, add exist_guest_id.
     */
    public function newChild($parent_id, $exist_guest_id = NULL)
    {
        $child = new Child();
        $child->child_id = $exist_guest_id;
        $child->parent = $parent_id;

        if (Companion::companionExists($parent_id)) {
            $child->parent_b = Companion::getMyCompanionId($parent_id);
            $child->save();
        } else {
            $child->save();
        }
    }

    public static function doIhaveAChild($id): int
    {
        $child = Child::where('parent', $id)->orWhere('parent_b', $id)->first();

        if ($child->count() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function getChildrensNames($id)
    {
        //
    }
}
