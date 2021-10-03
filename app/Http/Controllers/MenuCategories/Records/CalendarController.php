<?php

namespace App\Http\Controllers\MenuCategories\Records;

use App\Http\Controllers\Controller;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CalendarController extends Controller
{
    protected $dateTime;
    protected $day;
    protected $year;
    protected $month;
    protected $dayOfWeek;
    protected $monthDaysCount;

    public function dateGenerator(DateTimeImmutable $date)
    {
        //ISO 8601
        $this->dateTime = $date;
        $this->day = $this->dateTime->format('d');
        $this->year = $this->dateTime->format('Y');
        $this->month = $this->dateTime->format('m');
        $this->dayOfWeek = $this->dateTime->format('N');
        $this->monthDaysCount = $this->dateTime->format('t');
    }

    //первичный календарь
    public function handle(DateTimeImmutable $date)
    {
        $this->dateGenerator($date);
        $keyboard = $this->generateCalendar();
        $keyboard = $this->generateNavButtons($keyboard);
        $this->displayCalendar($keyboard);
    }


    public function generateCalendar()
    {
        $months = [
            'Январь', 'Февраль', 'Март', 'Апрель',
            'Май', 'Июнь', 'Июль', 'Август',
            'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь',
        ];

        $keyboard = [
            [
                ['text' => $months[$this->month-1], 'callback_data' => json_encode([
                    'data' => 'Сентябрь'
                ])]
            ],
            [
                ['text' => 'Пон', 'callback_data' => json_encode([
                    'data' => ''
                ])],
                ['text' => 'Вто', 'callback_data' => json_encode([
                    'data' => ''
                ])],
                ['text' => 'Сре', 'callback_data' => json_encode([
                    'data' => ''
                ])],
                ['text' => 'Чет', 'callback_data' => json_encode([
                    'data' => ''
                ])],
                ['text' => 'Пят', 'callback_data' => json_encode([
                    'data' => ''
                ])],
                ['text' => 'Суб', 'callback_data' => json_encode([
                    'data' => ''
                ])],
                ['text' => 'Вос', 'callback_data' => json_encode([
                    'data' => ''
                ])]
            ],
        ];


        $array = [];

        $firstDayOfWeek = $this->dateTime->setDate($this->year, $this->month, 1)->format('N');

        $k = 1;
        while ($k < $firstDayOfWeek) {
            $array[] = ['text' => ' ', 'callback_data' => json_encode([
                'data' => ''
            ])];
            $k++;
        }


        $i = 1;
        while ($i <= $this->monthDaysCount) {
            $array[] = ['text' => $i, 'callback_data' => json_encode([
                'month_number' => $this->month,
                'date' => $i
            ])];

            if ($this->dateTime->setDate($this->year, $this->month, $i)->format('N') % 7 == 0) {
                $keyboard[] = $array;
                $array = [];
            }

            if ($i == $this->monthDaysCount && $this->dateTime->setDate($this->year, $this->month, $i)->format('N') != 7) {
                $k = 1;
                while ($k <= (7 - $this->dateTime->setDate($this->year, $this->month, $i)->format('N'))) {
                    $array[] = ['text' => ' ', 'callback_data' => json_encode([
                        'data' => ''
                    ])];
                    $k++;
                }
                $keyboard[] = $array;
            }
            $i++;
        }

        return $keyboard;
    }

    //Кнопки навигации по календарю
    public function generateNavButtons($keyboard, $massageIdFlag = true)
    {
        if ($massageIdFlag) {
            $messageId = $this->messageId + 1;
        } else {
            $messageId = $this->messageId;
        }

        $previousMonth = $this->month - 1 > 0 ? $this->month - 1 : 1;
        $nextMonth = $this->month + 1 < 13 ? $this->month + 1 : 12;
        $keyboard[] = [
            ['text' => '<<', 'callback_data' => json_encode([
                'month' => $previousMonth,
                'message_id' => $messageId
            ])],
            ['text' => '>>', 'callback_data' => json_encode([
                'month' => $nextMonth,
                'message_id' => $messageId
            ])],
        ];

        return $keyboard;
    }

    //Отображение календаря
    public function displayCalendar($keyboard)
    {
        $message = $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
        ]);
    }


    //Навигация по календарю
    public function changeCalendar(DateTimeImmutable $date)
    {
        $this->dateGenerator($date);
        $keyboard = $this->generateCalendar();
        $keyboard = $this->generateNavButtons($keyboard, false);
        $keyboard = json_encode(['inline_keyboard' => $keyboard]);

        $data = http_build_query([
            'text' => 'Выберите дату:',
            'chat_id' => $this->chatId,
            'message_id' => $this->data['message_id']
        ]);
        file_get_contents('https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN')."/editMessageText?{$data}&reply_markup={$keyboard}");
    }

}
