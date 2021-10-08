<?php

namespace App\Http\Repositories\GroupsClientsRepository;

class GroupsClientsRepository extends BaseRepository
{
    public function addNew($groupId, $clientId)
    {
        $model = $this->model;
        $model->group_id = $groupId;
        $model->client_id = $clientId;
        return $model->save();
    }

    public function checkParticipation($groupId, $clientId)
    {
        return $this->model
            ->where('group_id', $groupId)
            ->where('client_id', $clientId)
            ->first();
    }
}
