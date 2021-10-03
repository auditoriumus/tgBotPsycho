<?php

namespace App\Http\Controllers\MenuControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StartMenuController extends Controller
{
    private array $startMenuList = [
        'Запись на группы',
        'Отменить запись',
        'FAQ',
        'Духовный цикл',
        'Рекомендации'
    ];

    public function displayStartMenu()
    {
        $menu = [];
        foreach ($this->startMenuList as $key => $menuItem) {
            if ($key % 2 == 0) {
                $menu[0][] = $menuItem;
            } else {
                $menu[1][] = $menuItem;
            }
        }

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }
}
