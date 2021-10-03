<?php

namespace App\Http\Controllers\MenuCategories\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CirclesController extends Controller
{
    public function displayWhatIsIt()
    {
        $menu = [
            'Вселенский круг',
            'Ангельский круг',
            'Круг энергий',
        ];

        $resultMenu = [];
        foreach ($menu as $key => $value) {
            if ($key % 2 == 0) {
                $resultMenu[0][] = $value;
            } else {
                $resultMenu[1][] = $value;
            }
        }
        $resultMenu[2][] = 'В начало';

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'FAQ. Выберите:',
            'reply_markup' => json_encode(['keyboard' => $resultMenu])
        ]);
    }
}
