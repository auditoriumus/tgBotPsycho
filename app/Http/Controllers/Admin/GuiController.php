<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuiController
{
    public function getClientsCsv()
    {
        return Excel::download(new ClientsExport, 'clients-collection.xlsx');
    }
}
