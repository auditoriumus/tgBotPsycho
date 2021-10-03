<?php

namespace App\Http\Services\ClientServices;


class GetClientService extends BaseService
{
    public function getByPhone(string $phone)
    {
        return $this->clientRepository->getByPhone($phone);
    }
}
