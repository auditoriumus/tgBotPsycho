<?php


namespace App\Http\Controllers\RegisterControllers;


use Illuminate\Support\Facades\Cache;

class UserRegisterController extends RegisterController
{
    public function index()
    {
        if (!Cache::has('register')) {
            Cache::put('register', 'true');
        }

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Введите фамилию или нажмите "В начало" для перезапуска:',
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

        Cache::put('second_name_' . $this->chatId, 'true');
    }

    public function createUser(){
        if (Cache::has('second_name_' . $this->chatId)) {

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Фамилия ' . $this->message . ' записывается в базу (база данных пока отключена)' . "\n" . 'Введите имя:',
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

            Cache::pull('second_name_' . $this->chatId);
            Cache::put('first_name_' . $this->chatId, 'true');
            return;

        } elseif (Cache::has('first_name_' . $this->chatId)) {

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Имя ' . $this->message . ' записывается в базу (база данных пока отключена)' . "\n" . 'Введите отчество:',
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

            Cache::pull('first_name_' . $this->chatId);
            Cache::put('middle_name_' . $this->chatId, 'true');
            return;

        } elseif (Cache::has('middle_name_' . $this->chatId)) {

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Отчество ' . $this->message . ' записывается в базу (база данных пока отключена)' . "\n" . 'Введите номер телефона:',
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

            Cache::pull('middle_name_' . $this->chatId);
            Cache::put('phone_' . $this->chatId, 'true');
            return;

        } elseif (Cache::has('phone_' . $this->chatId)) {

            $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Телефон ' . $this->message . ' записывается в базу (база данных пока отключена)' . "\n" . 'Опишите любой расстановочный опыт если есть (если нет напишите "нет опыта"):',
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

            Cache::pull('phone_' . $this->chatId);
            Cache::put('experience_' . $this->chatId, 'true');
            return;

        } elseif (Cache::has('experience_' . $this->chatId)) {

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Опыт ' . $this->message . ' записывается в базу (база данных пока отключена)' . "\n" . 'Благодарим за заявку, в ближайшее время мы с вами свяжемся',
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

            Cache::pull('experience_' . $this->chatId);
            return;
        }
    }
}
