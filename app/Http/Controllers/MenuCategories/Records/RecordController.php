<?php

namespace App\Http\Controllers\MenuCategories\Records;

use App\Http\Controllers\Controller;
use App\Http\Services\SpecialistServices\GetSpecialistService;
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
        $menu = [
            ['Даты ближайших групп', 'Лист ожидания (если даты не подходят)'],
            ['О специалисте'],
            ['В начало']
        ];

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
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
