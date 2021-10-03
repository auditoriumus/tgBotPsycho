<?php

namespace App\Http\Controllers\MenuControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuCategories\Cycle\SpiritualCycleController;
use App\Http\Controllers\MenuCategories\FAQ\CirclesController;
use App\Http\Controllers\MenuCategories\FAQ\FaqController;
use App\Http\Controllers\MenuCategories\NextButton;
use App\Http\Controllers\MenuCategories\Recommendations\RecommendationsController;
use App\Http\Controllers\MenuCategories\Records\ClientController;
use App\Http\Controllers\MenuCategories\Records\RecordController;
use App\Http\Services\ClientServices\GetClientService;
use App\Http\Services\SpecialistServices\GetSpecialistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuOptionsController extends Controller
{
    private array $options = [
        'Запись на группы' => [
            'class' => RecordController::class,
            'method' => 'addNewRecord'
        ],
        'Отменить запись' => [
            'class' => RecordController::class,
            'method' => 'cancelRecord'
        ],
        'FAQ' => [
            'class' => FaqController::class,
            'method' => 'displayFaqList'
        ],
        'Духовный цикл' => [
            'class' => SpiritualCycleController::class,
            'method' => 'displayOptions'
        ],
        'Рекомендации' => [
            'class' => RecommendationsController::class,
            'method' => 'displayOptions'
        ],
        'Запись на работу' => [
            'class' => RecordController::class,
            'method' => 'displaySpecialistsList'
        ],
        'О специалисте' => [
            'class' => RecordController::class,
            'method' => 'aboutSpecialist'
        ],
        'Запись в качестве заместителя' => [
            'class' => RecordController::class,
            'method' => 'recordAsAssistant'
        ],
        'Опыт есть' => [
            'class' => RecordController::class,
            'method' => 'displayCalendar'
        ],
        'Опыта нет' => [
            'class' => RecordController::class,
            'method' => 'displayCalendar'
        ],
        'Даты ближайших групп' => [
            'class' => ClientController::class,
            'method' => 'clientRegister'
        ],
        'Лист ожидания (если даты не подходят)' => [
            'class' => ClientController::class,
            'method' => 'clientRegister'
        ],
        'Далее' => [
            'class' => NextButton::class,
            'method' => 'handle'
        ],
        'Круги, что это и какие бывают' => [
            'class' => CirclesController::class,
            'method' => 'displayWhatIsIt'
        ],
        'Специалисты' => [
            'class' => RecordController::class,
            'method' => 'displaySpecialistsList'
        ]
    ];

    public function executeMenu(string $menuOption)
    {
        //Добавляем имена специалистов в опции
        $specialists = app(GetSpecialistService::class)->getAll()->toArray();
        $menu = $this->options;
        foreach ($specialists as $key => $specialist) {
            $menu[$specialist['name']] = [
                'class' => RecordController::class,
                'method' => 'chooseSpecialist'
            ];
        }
        $this->options = $menu;

        //Пробегаем по меню
        foreach ($this->options as $option => $value) {
            if ($menuOption == $option) {
                app($value['class'])->{$value['method']}();
                return;
            }
        }
        //Для навигации по календарю
        if (isset($this->data['month'])) {
            app(RecordController::class)->changeCalendar();
        }

        if (Cache::has('event_' . $this->chatId)) {
            $event = Cache::get('event_' . $this->chatId);
            switch ($event) {
                case 'phone_register':
                    Cache::put('phone_register_' . $this->chatId, $this->message);
                    break;
                case 'last_name_register':
                    Cache::put('last_name_register_' . $this->chatId, $this->message);
                    break;
                case 'first_name_register':
                    Cache::put('first_name_register' . $this->chatId, $this->message);
                    break;
                case 'patronymic':
                    Cache::put('patronymic_' . $this->chatId, $this->message);
                    break;
                case 'email':
                    Cache::put('email_' . $this->chatId, $this->message);
                    break;
                case 'experience':
                    Cache::put('experience_' . $this->chatId, $this->message);
                    break;
                case 'cancel_record':
                    Cache::put('cancel_record_' . $this->chatId, $this->message);
                    break;
            }
        }
    }
}
