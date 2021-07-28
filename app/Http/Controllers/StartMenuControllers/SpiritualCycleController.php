<?php

namespace App\Http\Controllers\StartMenuControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpiritualCycleController extends Controller
{
    public function index()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Духовный цикл. Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Заявка на новый поток',
                            'Я являюсь участником',
                        ],
                        [
                            'Духовный цикл - что это',
                        ],
                        [
                            'В начало',
                        ],
                    ],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                ]
            ),
        ]);
    }
}
