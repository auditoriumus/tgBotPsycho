<?php

namespace App\Http\Controllers\MenuCategories\FAQ;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuCategories\Records\RecordController;
use App\Http\Services\SpecialistServices\GetSpecialistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SpecialistsController extends Controller
{
    public function displayAll()
    {
        Cache::put('event_' . $this->chatId, 'faq_specialists');
        app(RecordController::class)->displaySpecialistsList();
    }

}
