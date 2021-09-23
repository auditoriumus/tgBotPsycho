<?php

namespace App\Http\Controllers\StartMenuControllers;

use App\Http\Controllers\Controller;

class ConsultingController extends Controller
{
    public function index()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Консультация с ЕС. Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Ситуация SOS',
                        ],
                        [
                            'В начало',
                        ]
                    ],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                ]
            ),
        ]);
    }
}
