<?php

namespace App\Http\Services\GroupsClientsServices;

use App\Http\Repositories\GroupsClientsRepository\GroupsClientsRepository;
use App\Http\Services\Service;
use App\Models\GroupClient;

class BaseService extends Service
{
    protected GroupsClientsRepository $groupsClientsRepository;

    public function __construct(GroupsClientsRepository $groupsClientsRepository)
    {
        $this->groupsClientsRepository = $groupsClientsRepository;
    }
}
