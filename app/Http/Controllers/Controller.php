<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $confirmation_time;

    public function __construct()
    {
        if(Carbon::now()->gte('07/01/2023')) {
            return $this->confirmation_time = false;
        } else {
            return $this->confirmation_time = true;
        }
    }
}
