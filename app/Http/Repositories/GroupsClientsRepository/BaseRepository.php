<?php

namespace App\Http\Repositories\GroupsClientsRepository;

use App\Http\Repositories\Repository;
use App\Models\GroupClient;

class BaseRepository extends Repository
{
    protected GroupClient $model;

    public function __construct(GroupClient $groupClient)
    {
        $this->model = $groupClient;
    }
}
