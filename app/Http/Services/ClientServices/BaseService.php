<?php

namespace App\Http\Services\ClientServices;

use App\Http\Repositories\ClientRepository\ClientRepository;
use App\Http\Services\Service;

class BaseService extends Service
{
    protected ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }
}
