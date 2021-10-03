<?php

namespace App\Http\Controllers\MenuCategories\FAQ;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuCategories\Records\RecordController;
use Illuminate\Http\Request;

class SpecialistsController extends Controller
{
    public function displayAll()
    {
        app(RecordController::class)->displaySpecialistsList();
    }
}
