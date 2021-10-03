<?php

namespace App\Http\Controllers\MenuCategories\Recommendations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecommendationsController extends Controller
{
    public function displayOptions()
    {
        $menu = [
            'Базовые лекции',
            'При остром горе',
            'Подростку',
            'В перинатальный период',
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
