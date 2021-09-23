<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\GetClientsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController
{
    public function index()
    {
        $clients = app(GetClientsService::class)->getAll();
        View::share([
            'clients' => $clients
        ]);
        return view('admin.clients');
    }
}
