<?php

namespace App\Http\Controllers;


use App\Http\Controllers\MenuControllers\MenuOptionsController;
use App\Http\Controllers\MenuControllers\StartMenuController;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function handle()
    {
        if ($this->message == '/start' || $this->message == 'В начало') {
            Cache::clear();
            app(StartMenuController::class)->displayStartMenu();
        } else {
            app(MenuOptionsController::class)->executeMenu($this->message);
        }
    }
}
