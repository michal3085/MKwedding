<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function addChild($id)
    {
        return view('children')->with([
            'gid' => $id
        ]);
    }

    public function saveChild(Request $request, $id)
    {
        //
    }
}
