<?php

namespace App\Http\Controllers\SiteControllers\Practices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IallowController extends Controller
{
    public function index()
    {
        return view('pages.practices.iallow');
    }
}
