<?php

namespace App\Http\Controllers\MenuCategories\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function displayFaqList()
    {
        $menu = [
            'Расстановочные группы',
            '"Работа" на группе',
            'Участие в качестве заместителя',
            'Круги, что это и какие бывают',
            'Специалисты',
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
