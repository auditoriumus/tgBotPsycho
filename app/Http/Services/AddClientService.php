<?php

namespace App\Http\Services;

class AddClientService extends BaseService
{
    public function addSecondName(int $chat_id, $value)
    {
        return $this->clientRepository->updateFieldByChatId($chat_id, 'second_name', $value);
    }

    public function addFirstName(int $chat_id, $value)
    {
        return $this->clientRepository->updateFieldByChatId($chat_id, 'first_name', $value);
    }

    public function addPatronymic(int $chat_id, $value)
    {
        return $this->clientRepository->updateFieldByChatId($chat_id, 'patronymic', $value);
    }

    public function addPhone(int $chat_id, $value)
    {
        return $this->clientRepository->updateFieldByChatId($chat_id, 'phone', $value);
    }

    public function addEmail(int $chat_id, $value)
    {
        return $this->clientRepository->updateFieldByChatId($chat_id, 'email', $value);
    }

    public function addExperience(int $chat_id, $value)
    {
        return $this->clientRepository->updateFieldByChatId($chat_id, 'experience', $value);
    }

    public function addSpecialistId(int $chat_id, $value)
    {
        return $this->clientRepository->updateFieldByChatId($chat_id, 'specialist_id', $value);
    }

    public function addChatId(int $chat_id)
    {
        return $this->clientRepository->addNew($chat_id);
    }

    public function findChat(int $chat_id)
    {
        return $this->clientRepository->findItemByChatId($chat_id);
    }

}
