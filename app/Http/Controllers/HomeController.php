<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\RegisterControllers\UserRegisterController;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        if (Cache::has('register') && $this->message !== 'В начало' && $this->message !== '/start') {
            app(UserRegisterController::class)->createUser();
            return;
        }

        // в стартовое меню
        if ($this->message === '/start' || $this->message === 'В начало') {
            app(StartMenuController::class)->startMenu();
            return;
        }

        // если выбрана категория внутреннего меню
        foreach ($this->internalMenu as $menuItem) {
            if ($this->message == $menuItem['name']) {
                app($menuItem['controller'])->{$menuItem['method']}();
                return;
            }
        }

        // если выбрана категория стартового меню
        if (array_search($this->message, $this->startMenu) >= 0 && array_search($this->message, $this->startMenu) !== false) {
            $key = array_search($this->message, $this->startMenu);
            foreach ($this->startCommands[$key] as $controller => $method) {
                app($controller)->{$method}();
                return;
            }
        }

        // если происходит регистрация нового пользователя "Записаться"
        if ($this->message == 'Записаться') {
            app(UserRegisterController::class)->index();
            return;
        }

        //админ-панель
        if ($this->message == '/admin') {
            if ($this->checkAdmin()) {
                app(CmsController::class)->index();
            }
            return;
        }

        if ($this->message == 'Выгрузка по клиентам') {
            if ($this->checkAdmin()) {
                app(CmsController::class)->getClientsCsv();
            }
        }
    }
}
