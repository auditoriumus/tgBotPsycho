<?php

namespace App\Http\Services\ClientServices;

class AddUpdateClientService extends BaseService
{
    public function addNew(string $phone)
    {
        return $this->clientRepository->addPhone($phone);
    }

    public function updateByPhone(string $phone, string $field, string $value)
    {
        $data = [];
        $data['field'] = $field;
        $data['value'] = $value;
        return $this->clientRepository->updateByPhone($phone, $data);
    }
}
