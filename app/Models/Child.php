<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    public function guest()
    {
        return $this->hasMany('App\Model\Guest');
    }

    /*
     * If child exist in Guests table, add exist_guest_id.
     */
    public static function newChild($parent_id, $exist_guest_id = NULL)
    {
        $check = Guest::where('id', $exist_guest_id)->first();
        $exist_child = Child::where('child_id', $exist_guest_id)->first();

        if ($exist_child !== NULL && $exist_child->parent_b == NULL) {
            $exist_child->parent_b = $parent_id;
            $exist_child->save();

        } else {
            $child = new Child();
            $child->child_id = $exist_guest_id;
            $child->parent = $parent_id;

            if (Companion::companionExists($parent_id)) {
                $child->parent_b = Companion::getMyCompanionId($parent_id);
            }
            $child->save();
        }
    }

    public static function doIHaveAChild($id): int
    {
        $child = Child::where('parent', $id)->orWhere('parent_b', $id)->get();

        if ($child->count() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function getChildrensData($id)
    {
        $childrens = Child::where('parent', $id)->orWhere('parent_b', $id)->pluck('child_id');
        return Guest::whereIn('id', $childrens)->get();
    }

    public static function amIaChild($id)
    {
        if (Child::where('child_id', $id)->count() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function getMyChildsData($id)
    {
        $children = Child::where('parent', $id)->orWhere('parent_b', $id)->pluck('child_id');
        return Guest::where('id', $children)->get();
    }
}
