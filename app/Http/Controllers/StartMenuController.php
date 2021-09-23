<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StartMenuController extends Controller
{
    public function startMenu()
    {
        Cache::flush();
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Консультация с ЕС',
                            'Духовный цикл',
                        ],
                        [
                            'Запись на ВК',
                            'Расстановки',
                        ],
                        [
                            'Запись',
                            'Базовые лекции',
                        ],
                    ],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                ]
            ),
        ]);
    }
}
