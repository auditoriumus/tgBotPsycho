<?php

namespace App\Http\Controllers\MenuCategories\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function handle()
    {
        $menu = [
            ['В начало']
        ];

        $text = 'Заместитель - участник расстановочной группы. Мы не разделяем заместителей и наблюдателей, считаем, что процесс полезен всем участникам группы. Заместитель не делает свою работу, но все может участвовать в расстановке или наблюдать за происходящем на группе.';

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => $text,
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }
}
