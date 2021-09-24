<?php

namespace App\Exports;

use App\Http\Services\GetSpecialistService;
use Maatwebsite\Excel\Concerns\FromCollection;

class SpecialistsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return app(GetSpecialistService::class)->getAllForCsv();
    }
}
