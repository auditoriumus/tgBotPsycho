<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
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
}
