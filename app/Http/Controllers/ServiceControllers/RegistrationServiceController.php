<?php


namespace App\Http\Controllers\ServiceControllers;


class RegistrationServiceController extends ServiceController
{
    // Запись на ВК
    public function UCRecord()
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

    // Запись на круги
    public function circlesRecord()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Записаться',
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

    // Запись на расстановки
    public function placementsRecord()
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

    // Запись на личные консультации к Екатерине
    public function personalRecord()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Запись к специалистам из команды',
                            'Запись на расстановки специалистов из команды',
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

    // Запись на расстановки специалистов из команды
    public function placementsBySpecialistsRecord()
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
