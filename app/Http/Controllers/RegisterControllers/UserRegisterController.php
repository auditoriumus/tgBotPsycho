<?php


namespace App\Http\Controllers\RegisterControllers;


use App\Http\Services\AddClientService;
use App\Http\Services\GetSpecialistService;
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

            $this->registerChatId();
            app(AddClientService::class)->addSecondName($this->chatId, $this->message);

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Фамилия принята' . "\n" . 'Введите имя:',
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

            $this->registerChatId();
            app(AddClientService::class)->addFirstName($this->chatId, $this->message);

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Имя принято' . "\n" . 'Введите отчество:',
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

            $this->registerChatId();
            app(AddClientService::class)->addPatronymic($this->chatId, $this->message);

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Отчество принято' . "\n" . 'Введите номер телефона:',
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

            $this->registerChatId();
            app(AddClientService::class)->addPhone($this->chatId, $this->message);

            $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Телефон принят' . "\n" . 'Введите email',
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
            Cache::put('email_' . $this->chatId, 'true');
            return;

        } elseif (Cache::has('email_' . $this->chatId)) {

            $this->registerChatId();
            app(AddClientService::class)->addEmail($this->chatId, $this->message);

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Email принят' . "\n" . 'Опишите любой расстановочный опыт если есть (если нет напишите "нет опыта"):',
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

            Cache::pull('email_' . $this->chatId);
            Cache::put('experience_' . $this->chatId, 'true');

        } elseif (Cache::has('experience_' . $this->chatId)) {

            $this->registerChatId();
            app(AddClientService::class)->addExperience($this->chatId, $this->message);

            $specialistsArray = app(GetSpecialistService::class)->getAll();
            $specialists = '';

            foreach ($specialistsArray as $spec) {
                $specialists .= $spec['id'] . '. ' . $spec['name'] .  "\n";
            }

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                //'text' => 'Опыт принят' . "\n" . 'Благодарим за заявку, в ближайшее время мы с вами свяжемся',
                'text' => 'Опыт принят' . "\n" . 'К кому из специалистов вы хотели бы записаться (введите номер специалиста):' . "\n" . $specialists,
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
            Cache::put('specialist_' . $this->chatId, 'true');
            return;
        }  elseif (Cache::has('specialist_' . $this->chatId)) {

            $this->registerChatId();
            app(AddClientService::class)->addSpecialistId($this->chatId, $this->message);


            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Принято' . "\n" . 'Благодарим за заявку, в ближайшее время мы с вами свяжемся',
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

            Cache::pull('specialist_' . $this->chatId, 'true');
            return;
        }
    }

    protected function registerChatId()
    {
        $chat = app(AddClientService::class)->findChat($this->chatId);
        if (empty($chat)) {
            app(AddClientService::class)->addChatId($this->chatId);
        }
    }
}
