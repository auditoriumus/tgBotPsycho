<?php

namespace App\Http\Controllers\StartMenuControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Запись. Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Запись на ВК',
                            'Запись на круги',
                        ],
                        [
                            'Запись на расстановки',
                            'Запись на личные консультации к Екатерине',
                        ],
                        [
                            'Запись к специалистам из команды',
                            'В начало'
                        ],
                    ],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                ]
            ),
        ]);
    }
}
