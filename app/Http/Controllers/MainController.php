<?php

namespace App\Http\Controllers;

use App\Models\BrideAndGroom;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = BrideAndGroom::first();
        return view('home')->with('data', $data);
    }
}
