<?php

namespace App\Http\Repositories\GroupRepository;

use App\Http\Repositories\Repository;
use App\Models\Group;

class BaseRepository extends Repository
{
    protected Group $model;

    public function __construct(Group $group)
    {
        $this->model = $group;
    }
}
