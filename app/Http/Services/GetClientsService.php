<?php

namespace App\Http\Services;

class GetClientsService extends BaseService
{
    public function getAll()
    {
        $clientsArray = $this->clientRepository
            ->getAll()->toArray();

        $array = [];

        foreach ($clientsArray as $key => $clientItem) {
            $array[$key]['name'] = $clientItem['second_name'] . ' ' . $clientItem['first_name'] . ' ' . $clientItem['patronymic'];
            $array[$key]['phone'] = $clientItem['phone'];
            $array[$key]['email'] = $clientItem['email'];
            $array[$key]['specialist'] = $clientItem['specialist']['name'];
        }
        return collect($array);
    }
}
