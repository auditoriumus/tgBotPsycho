<?php

namespace App\Http\Controllers\SiteControllers\Practices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HungryController extends Controller
{
    public function index()
    {
        return view('pages.practices.whoishungry');
    }
}
