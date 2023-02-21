<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Lp.',
            'Imię',
            'Nazwisko',
            'Potwierdzony?',
            'Transport 1/0',
            'Trasnport z',
            'Nocleg',
            'Alergie/Uwagi',
            'Vege',
            'Dziecko',
            'Wiek Dziecka',
            'Data utworzenia',
            'Data Edycji'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guest::all();
    }
}
