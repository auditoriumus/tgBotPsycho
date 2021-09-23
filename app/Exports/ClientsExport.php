<?php

namespace App\Exports;

use App\Http\Services\GetClientsService;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return app(GetClientsService::class)->getAll();
    }
}
