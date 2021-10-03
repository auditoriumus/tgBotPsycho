<?php

namespace App\Http\Controllers\MenuCategories;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuCategories\Records\ClientController;
use App\Http\Controllers\MenuCategories\Records\RecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NextButton extends Controller
{
    public function handle()
    {
        if (Cache::has('event_' . $this->chatId)) {
            $event = Cache::get('event_' . $this->chatId);
            switch ($event) {
                case 'phone_register':
                    app(ClientController::class)->phoneRegister();
                    break;
                case 'last_name_register':
                    app(ClientController::class)->lastNameRegister();
                    break;
                case 'first_name_register':
                    app(ClientController::class)->firstNameRegister();
                    break;
                case 'patronymic':
                    app(ClientController::class)->patronymicRegister();
                    break;
                case 'email':
                    app(ClientController::class)->emailRegister();
                    break;
                case 'experience':
                    app(ClientController::class)->experienceRegister();
                    break;
                case 'cancel_record':
                    app(RecordController::class)->deleteRecord();
                    break;
            }
        }
    }


}
