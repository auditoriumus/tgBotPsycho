<?php

namespace App\Http\Controllers\MenuCategories\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkOnGroupController extends Controller
{
    public function hande()
    {
        $menu = [
            ['В начало']
        ];

        $text = 'Участник расстановочной группы или круга, который заказывает свою расстановку. Одна работа длится от 30 минут до 1,5 часа. Стоимость работы не зависит от времени проведения самой расстановки. Мы рекомендуем прежде чем приходить на группу со своим запросом, поприсутствовать в качестве заместителя, но это не обязательное условие.';

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => $text,
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }
}
