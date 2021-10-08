<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Telegram\Bot\Api;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $chatId;
    protected $message;
    protected $messageId;
    protected $telegram;
    protected $data;

    public function __construct(Request $request)
    {
        $this->phoneValidate('+89778732.8&12');
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $updates = $this->telegram->getWebhookUpdate();

        $this->chatId = $updates->message->chat->id ?? '';
        $this->messageId = $updates->message->message_id ?? '';
        $this->message = $updates->message->text ?? '';

        $callbackQuery = $request->input('callback_query') ?? null;
        if (!empty($callbackQuery)) {
            $this->chatId = $callbackQuery['message']['chat']['id'] ?? '';
            $this->messageId = $callbackQuery['message']['message_id'] ?? '';
            $this->message = $updates['message']['text'] ?? '';
            $this->data = $callbackQuery['data'] ? json_decode($callbackQuery['data'], true) : '';
        }
    }

    protected function russianPhoneValidate(string $phone): bool
    {
        //убираем пробелы по бокам
        $phone = trim($phone);
        //находим и убираем пробелы внутри номера
        $phone = preg_replace('# #', '', $phone);
        //находим и убираем +
        $phone = str_replace('+', '', $phone);
        //Если номер начинается с 8 или 7
        if (mb_strlen($phone) == 11 && ($phone[0] == 7 || $phone[0] == 8)) {
            $phone = substr($phone, 1);
        }
        //если после преобразований в номере осталось 10 символов
        if (mb_strlen($phone) == 10) {
            //если все цифры
            if (ctype_digit($phone)) {
                return true;
            }
        }
        return false;
    }

    protected function phoneValidate(string $phone): bool
    {
        //убираем пробелы по бокам
        $phone = trim($phone);
        //находим и убираем пробелы внутри номера
        $phone = preg_replace('# #', '', $phone);
        //находим и убираем +
        $phone = str_replace('+', '', $phone);
        if (ctype_digit($phone)) {
            return true;
        }
        return false;
    }
}
