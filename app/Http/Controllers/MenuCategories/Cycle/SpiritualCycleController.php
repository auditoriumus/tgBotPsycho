<?php

namespace App\Http\Controllers\MenuCategories\Cycle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpiritualCycleController extends Controller
{
    public function displayOptions()
    {
        $menu = [
            'Запись на новый поток',
            'Ссылка на форму заявки',
            'Что это',
            'Ссылка на сайт',
            'FAQ. Духовный цикл',
        ];

        $resultMenu = [];
        foreach ($menu as $key => $value) {
            if ($key % 2 == 0) {
                $resultMenu[0][] = $value;
            } else {
                $resultMenu[1][] = $value;
            }
        }
        $resultMenu[2][] = 'В начало';

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'FAQ. Выберите:',
            'reply_markup' => json_encode(['keyboard' => $resultMenu])
        ]);
    }
}
