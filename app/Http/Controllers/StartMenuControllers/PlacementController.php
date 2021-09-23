<?php

namespace App\Http\Controllers\StartMenuControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function index()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Расстановки. Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Что такое расстановки',
                            'Круги',
                        ],
                        [
                            'Запись на вселенский круг',
                            'Запись к специалистам из команды',
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
