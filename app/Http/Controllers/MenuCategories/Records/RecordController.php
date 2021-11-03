<?php

namespace App\Http\Controllers\MenuCategories\Records;

use App\Http\Controllers\Controller;
use App\Http\Services\GroupServices\GetGroupService;
use App\Http\Services\SpecialistServices\GetSpecialistService;
use Carbon\Carbon;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RecordController extends Controller
{
    //Запись на группу
    public function addNewRecord()
    {
        $menu = [
            ['Запись на работу', 'Запись в качестве заместителя'],
            ['В начало']
        ];

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }

    //Отменить запись
    public function cancelRecord()
    {
        Cache::put('event_' . $this->chatId, 'cancel_record');

        $menu = [
            ['Далее'],
            ['В начало'],
        ];

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Введите номер телефона и нажмите "Далее":',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }

    //Удаление записи
    public function deleteRecord()
    {
        $phone = Cache::get('cancel_record_' . $this->chatId) ?? '';

        $menu = [
            ['В начало'],
        ];

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Запись по номеру телефона ' . $phone . ' удалена',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }


    //Запись на работу
    public function displaySpecialistsList()
    {
        $specialists = app(GetSpecialistService::class)->getAll()->toArray();

        $menu = [];
        foreach ($specialists as $key => $specialist) {
            if ($key % 2 == 0) {
                $menu[0][] = $specialist['name'];
            } else {
                $menu[1][] = $specialist['name'];
            }
        }
        $menu[2][] = 'В начало';

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите специалиста:',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }

    //Запись в качестве заместителя
    public function recordAsAssistant()
    {
        $menu = [
            ['Опыт есть', 'Опыта нет'],
            ['В начало']
        ];


        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }

    //Выбор специалиста
    public function chooseSpecialist()
    {
        $text = ' ';
        $menu = [];

        if (Cache::has('event_' . $this->chatId)) {
            if (Cache::get('event_' . $this->chatId) == 'faq_specialists') {
                $specialist = app(GetSpecialistService::class)->getByName($this->message);
                $text = $specialist->description;
            }
            $menu = [
                ['В начало']
            ];

            $text = 'Выберите:';
        } else {

            Cache::put('event_' . $this->chatId, 'record_to');
            Cache::put('record_to_' . $this->chatId, $this->message);
            $groups = app(GetGroupService::class)->getGroupBySpecialistName($this->message);

            if (!empty($groups)) {
                $i = 1;
                foreach ($groups as $group) {
                    if ($group->count < 15) {
                        $carbon = Carbon::createFromFormat('Y-m-d', $group->date);
                        $text .= $carbon->format('d.m.Y') . ' - запись возможна' . "\n";
                        $tmp = [
                            'group_date_number' => $i,
                            'group_date_id' => $group->id,
                            'date' => $carbon->format('d.m.Y')
                        ];
                        $dates[] = $tmp;
                    } else {
                        $carbon = Carbon::createFromFormat('Y-m-d', $group->date);
                        $text .= $carbon->format('d.m.Y') . ' - запись закрыта' . "\n";
                    }
                    $i++;
                }

                Cache::put('group_dates_' . $this->chatId, json_encode($dates));

                $text .= 'Введите дату и нажмите "Выбрать группу":';

            }


            $menu = [
                ['Выбрать группу', 'Лист ожидания (если даты не подходят)'],
                ['В начало']
            ];
        }


        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => $text,
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }

    //выбрать группу по номеру даты
    public function chooseGroupIdByGroupDateNumber($groupDateNumber)
    {
        if (Cache::has('group_dates_' . $this->chatId)) {
            $dates = json_decode(Cache::get('group_dates_' . $this->chatId), true);

            foreach ($dates as $date) {
                if ($date['group_date_number'] == $groupDateNumber) {
                    $groupId = $date['group_date_id'];
                    Cache::clear();
                    Cache::put('group_id_' . $this->chatId, $groupId);
                    break;
                }
            }
        }
    }


    public function chooseGroupIdByGroupDate($groupDate)
    {
        if (Cache::has('group_dates_' . $this->chatId)) {
            $dates = json_decode(Cache::get('group_dates_' . $this->chatId), true);

            foreach ($dates as $date) {
                if ($date['date'] == $groupDate) {
                    $groupId = $date['group_date_id'];
                    Cache::clear();
                    Cache::put('group_id_' . $this->chatId, $groupId);
                    break;
                }
            }
        }
    }

    //О специалисте
    public function aboutSpecialist()
    {
        $menu = [
            ['В начало']
        ];

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Информация о специалисте',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }

    public function displayCalendar()
    {
        $date = new DateTimeImmutable(date('Y').date('m').'01');
        app(CalendarController::class)->handle($date);
    }

    public function changeCalendar()
    {
        $date = new DateTimeImmutable(date('Y').'-'.date($this->data['month']).'-'.'01');
        app(CalendarController::class)->changeCalendar($date);
    }
}
