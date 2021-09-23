<?php

namespace App\Http\Repositories;

use App\Models\Client;

class ClientRepository
{
    protected Client $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    public function getAll()
    {
        return $this->model
            ->with('specialist')
            ->get();
    }

    public function findItemByChatId(int $chat_id)
    {
        return $this->model
            ->where('chat_id', $chat_id)
            ->first();
    }

    public function addNew($chat_id)
    {
        if (!$this->findItemByChatId($chat_id)) {
            $this->model->chat_id = $chat_id;
            return $this->model->save();
        }
    }

    public function saveNew(array $data)
    {
        $this->model->chat_id = $data['chat_id'];
        $this->model->first_name = $data['first_name'];
        $this->model->second_name = $data['second_name'];
        $this->model->patronymic = $data['patronymic'];
        $this->model->phone = $data['phone'];
        $this->model->email = $data['email'];
        $this->model->experience = $data['experience'];
        $this->model->specialist_id = $data['specialist_id'];
        return $this->model->save();
    }

    public function updateFieldByChatId(int $chat_id, string $field_name, $field_value): bool
    {
        $model = $this->findItemByChatId($chat_id);
        $model->{$field_name} = $field_value;
        return $model->save();
    }


    public function saveFieldByChatId(int $chat_id, string $field_name, $field_value): bool
    {
        $this->model->{$field_name} = $field_value;
        return $this->model->save();
    }
}
