<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CmsController extends Controller
{
    public function index()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            'Выгрузка по клиентам',
                        ],
                        [
                            'В начало',
                        ]
                    ],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                ]
            ),
        ]);
    }
}
