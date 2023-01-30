<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    // https://docs.laravel-excel.com/3.1/exports/
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guest::all();
    }
}
