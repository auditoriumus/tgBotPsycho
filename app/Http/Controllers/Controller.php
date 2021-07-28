<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ServiceControllers\ConsultingServiceController;
use App\Http\Controllers\ServiceControllers\PlacementServiceController;
use App\Http\Controllers\ServiceControllers\RegistrationServiceController;
use App\Http\Controllers\ServiceControllers\SpiritualCycleServiceController;
use App\Http\Controllers\StartMenuControllers\ConsultingController;
use App\Http\Controllers\StartMenuControllers\PlacementController;
use App\Http\Controllers\StartMenuControllers\RegistrationController;
use App\Http\Controllers\StartMenuControllers\SpiritualCycleController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Telegram\Bot\Api;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Api $telegram;
    protected \Telegram\Bot\Objects\Update $result;
    protected $chatId;
    protected array $startMenu = [
        'Консультация с ЕС',
        'Духовный цикл',
        'Запись на ВК',
        'Расстановки',
        'Запись',
        'Базовые лекции',
    ];

    protected array $startCommands = [
        [ConsultingController::class => 'index'],
        [SpiritualCycleController::class => 'index'],
        [],
        [PlacementController::class => 'index'],
        [RegistrationController::class => 'index'],
        [],
    ];

    protected string $message;

    protected array $internalMenu = [
        [
            'name' => 'Ситуация SOS',
            'controller' => ConsultingServiceController::class,
            'method' => 'sosSituation',
        ],
        [
            'name' => 'По здоровью',
            'controller' => ConsultingServiceController::class,
            'method' => 'byHealth',
        ],
        [
            'name' => 'Псих. соответствие',
            'controller' => ConsultingServiceController::class,
            'method' => 'psychoСompliance',
        ],
        //
        [
            'name' => 'Заявка на новый поток',
            'controller' => SpiritualCycleServiceController::class,
            'method' => 'newStream',
        ],
        [
            'name' => 'Я являюсь участником',
            'controller' => SpiritualCycleServiceController::class,
            'method' => 'iAmParticipant',
        ],
        [
            'name' => 'Духовный цикл - что это',
            'controller' => SpiritualCycleServiceController::class,
            'method' => 'spiritualCycleIs',
        ],
        [
            'name' => 'Вопрос к коучу',
            'controller' => SpiritualCycleServiceController::class,
            'method' => 'questionToCoach',
        ],
        [
            'name' => 'Вопрос по оплате',
            'controller' => SpiritualCycleServiceController::class,
            'method' => 'paymentQuestion',
        ],
        //
        [
            'name' => 'Что такое расстановки',
            'controller' => PlacementServiceController::class,
            'method' => 'placementIs',
        ],
        [
            'name' => 'Круги',
            'controller' => PlacementServiceController::class,
            'method' => 'circles',
        ],
        [
            'name' => 'Запись на вселенский круг',
            'controller' => PlacementServiceController::class,
            'method' => 'universalCircleRegister',
        ],
        [
            'name' => 'Запись к специалистам из команды',
            'controller' => PlacementServiceController::class,
            'method' => 'teamSpecialists',
        ],
        [
            'name' => 'Ангельский',
            'controller' => PlacementServiceController::class,
            'method' => 'angelCircle',
        ],
        [
            'name' => 'Энергетичесикй',
            'controller' => PlacementServiceController::class,
            'method' => 'energyCircle',
        ],
        [
            'name' => 'Вселенский',
            'controller' => PlacementServiceController::class,
            'method' => 'universalCircle',
        ],
        //
        [
            'name' => 'Запись на ВК',
            'controller' => RegistrationServiceController::class,
            'method' => 'UCRecord',
        ],
        [
            'name' => 'Запись на круги',
            'controller' => RegistrationServiceController::class,
            'method' => 'circlesRecord',
        ],
        [
            'name' => 'Запись на расстановки',
            'controller' => RegistrationServiceController::class,
            'method' => 'placementsRecord',
        ],
        [
            'name' => 'Запись на личные консультации к Екатерине',
            'controller' => RegistrationServiceController::class,
            'method' => 'personalRecord',
        ],
        [
            'name' => 'Запись на расстановки специалистов из команды',
            'controller' => RegistrationServiceController::class,
            'method' => 'placementsBySpecialistsRecord',
        ],
    ];

    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_TOKEN'));
        $this->result = $this->telegram->getWebhookUpdate();
        $this->chatId = $this->result['message']['chat']['id'];
        $this->message = $this->result['message']['text'] ?? '';
    }
}
