<?php

namespace App\Http\Controllers\MenuCategories\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlacementGroupsController extends Controller
{
    public function handle()
    {
        $menu = [
            ['В начало']
        ];

        $text = 'С этих групп лучше всего начинать знакомство с методом. Запрос для работы может быть любым, именно то, что вас волнует, какую ситуацию хотели бы разобрать. Участие возможно без опыта. В группе участвует 20-25 человек, из которых 5/6 человек - клиенты со своим запросом (работающие), остальные участники выступают в качестве проводящих энергию фигур, мы их называем - заместителями. Проводят все специалисты из команды, смотрите расписание. ';

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => $text,
            'reply_markup' => json_encode(['keyboard' => $menu])
        ]);
    }
}
