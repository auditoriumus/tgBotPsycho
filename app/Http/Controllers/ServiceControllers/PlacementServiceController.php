<?php


namespace App\Http\Controllers\ServiceControllers;


class PlacementServiceController extends ServiceController
{
    // Что такое расстановки
    public function placementIs()
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

    // Круги
    public function circles()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Ангельский',
                            'Энергетичесикй',
                            'Вселенский',
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

    // Запись на вселенский круг
    public function universalCircleRegister()
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

    // Запись к специалистам из команды
    public function teamSpecialists()
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

    // Ангельский
    public function angelCircle()
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

    // Энергетичесикй
    public function energyCircle()
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

    // Вселенский
    public function universalCircle()
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
