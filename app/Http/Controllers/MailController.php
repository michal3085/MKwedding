<?php

namespace App\Http\Controllers;

use App\Mail\GuestConfirme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function confirmMail($name)
    {
        Mail::to('michal3085@gmail.com')->send(new GuestConfirme($name));
    }
}
