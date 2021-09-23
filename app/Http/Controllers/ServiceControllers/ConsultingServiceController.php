<?php


namespace App\Http\Controllers\ServiceControllers;


use App\Http\Controllers\Controller;

class ConsultingServiceController extends ServiceController
{
    public function sosSituation()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'По здоровью',
                            'Псих. соответствие',
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

    public function byHealth()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
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

    public function psychoСompliance()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
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
