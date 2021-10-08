<?php

namespace App\Http\Services\GroupServices;

use App\Http\Repositories\GroupRepository\GroupRepository;
use App\Http\Services\Service;

class BaseService extends Service
{
    protected GroupRepository $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }
}
