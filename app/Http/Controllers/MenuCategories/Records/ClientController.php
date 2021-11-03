<?php

namespace App\Http\Controllers\MenuCategories\Records;

use App\Http\Controllers\Controller;
use App\Http\Services\ClientServices\AddUpdateClientService;
use App\Http\Services\ClientServices\GetClientService;
use App\Http\Services\GroupsClientsServices\AddUpdateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientController extends Controller
{
    private function stepUp(string $message)
    {
        $menu = [
            ['Далее'],
            ['В начало']
        ];

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Введите ' . $message . ' и нажмите "Далее":',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }

    public function clientRegister()
    {
        Cache::put('event_' . $this->chatId, 'phone_register');
        $this->stepUp('номер телефона начиная с +7');
    }

    public function phoneRegister()
    {
        $phone = Cache::get('phone_register_' . $this->chatId);

        if (empty($phone) || !$this->phoneValidate($phone)) {
            $menu = [
                ['Далее'],
                ['В начало']
            ];

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Неверный ввод, попробуйте еще раз. Вводите номер начиная с +7',
                'reply_markup' => json_encode(['keyboard' => $menu])
            ]);
            return;
        }

        //Далее при запонлнении анкеты работаем с этими данными
        Cache::put('current_phone_' . $this->chatId, $phone);
        $client = app(GetClientService::class)->getByPhone($phone);
        if (!empty($client)) {

            $groupId = Cache::get('group_id_' . $this->chatId);

            app(AddUpdateService::class)->addNew($groupId, $client->id);

            $menu = [
                ['В начало']
            ];

            $this->telegram->sendMessage([
                'chat_id' => $this->chatId,
                'text' => 'Вы зарегистрированы. Мы скоро с вами свяжемся',
                'reply_markup' => json_encode(['keyboard' => $menu])
            ]);
            return;
        } else {
            app(AddUpdateClientService::class)->addNew($phone);
        }

        Cache::pull('phone_register_' . $this->chatId);

        Cache::put('event_' . $this->chatId, 'last_name_register');
        $this->stepUp('фамилию');
    }

    public function lastNameRegister()
    {
        $phone = Cache::get('current_phone_' . $this->chatId);
        $client = app(GetClientService::class)->getByPhone($phone);
        if (!empty($client)) {
            $lastName = Cache::get('last_name_register_' . $this->chatId) ?? '';
            if (app(AddUpdateClientService::class)->updateByPhone($phone, 'last_name', $lastName)) {
                Cache::pull('last_name_register_' . $this->chatId);
                Cache::put('event_' . $this->chatId, 'first_name_register');
                $this->stepUp('имя');
            }
        }
    }

    public function firstNameRegister()
    {
        $phone = Cache::get('current_phone_' . $this->chatId);
        $client = app(GetClientService::class)->getByPhone($phone);
        if (!empty($client)) {
            $firstName = Cache::get('first_name_register_' . $this->chatId) ?? '';
            if (app(AddUpdateClientService::class)->updateByPhone($phone, 'first_name', $firstName)) {
                Cache::pull('first_name_register_' . $this->chatId);
                Cache::put('event_' . $this->chatId, 'experience');
                $this->stepUp('опыт (или напишите "нет опыта")');
            }
        }
    }

//    public function patronymicRegister()
//    {
//        $phone = Cache::get('current_phone_' . $this->chatId);
//        $client = app(GetClientService::class)->getByPhone($phone);
//        if (!empty($client)) {
//            $patronymic = Cache::get('patronymic_' . $this->chatId) ?? '';
//            if (app(AddUpdateClientService::class)->updateByPhone($phone, 'patronymic', $patronymic)) {
//                Cache::pull('patronymic_' . $this->chatId);
//                Cache::put('event_' . $this->chatId, 'email');
//                $this->stepUp('адрес электронной почты');
//            }
//        }
//    }


//    public function emailRegister()
//    {
//        $phone = Cache::get('current_phone_' . $this->chatId);
//        $client = app(GetClientService::class)->getByPhone($phone);
//        if (!empty($client)) {
//            $patronymic = Cache::get('email_' . $this->chatId) ?? '';
//            if (app(AddUpdateClientService::class)->updateByPhone($phone, 'email', $patronymic)) {
//                Cache::pull('email_' . $this->chatId);
//                Cache::put('event_' . $this->chatId, 'experience');
//                $this->stepUp('опыт (или напишите "нет опыта")');
//            }
//        }
//    }


    public function experienceRegister()
    {
        $phone = Cache::get('current_phone_' . $this->chatId);
        $client = app(GetClientService::class)->getByPhone($phone);
        if (!empty($client)) {
            $experience = Cache::get('experience_' . $this->chatId) ?? '';
            if (app(AddUpdateClientService::class)->updateByPhone($phone, 'experience', $experience)) {

                $clientId = $client->id;
                $groupId = Cache::get('group_id_' . $this->chatId);
                if (!empty($clientId) && !empty($groupId)) {
                    app(AddUpdateService::class)->addNew($groupId, $clientId);
                }

                Cache::pull('experience_' . $this->chatId);
                Cache::put('event_' . $this->chatId, 'approval');

                $menu = [
                    ['Разрешить', 'Не разрешать'],
                    ['В начало'],
                ];

                $this->telegram->sendMessage([
                    'chat_id' => $this->chatId,
                    'text' => 'Необходимо ваше разрешение на обработку персональных данных',
                    'reply_markup' => json_encode(['keyboard' => $menu])
                ]);
            }
        }
    }


    //согласие на обработку данных
    public function approvalRegister()
    {
        $phone = Cache::get('current_phone_' . $this->chatId);
        $client = app(GetClientService::class)->getByPhone($phone);

        if (!empty($client)) {
            $approval = $this->message == 'Разрешить';
            if (app(AddUpdateClientService::class)->updateByPhone($phone, 'personal_data_processing_approval', $approval)) {

                $menu = [
                    ['В начало']
                ];

                $this->telegram->sendMessage([
                    'chat_id' => $this->chatId,
                    'text' => 'Благодарим за регистрацию, мы свяжемся с вами в течении 72 часов',
                    'reply_markup' => json_encode(['keyboard' => $menu])
                ]);
            }
        }
    }



    public function waitingList()
    {
        Cache::put('event_' . $this->chatId, 'phone_register');
        $this->stepUp('номер телефона');
    }
}
