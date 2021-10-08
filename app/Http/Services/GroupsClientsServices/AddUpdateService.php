<?php

namespace App\Http\Services\GroupsClientsServices;

class AddUpdateService extends BaseService
{
    public function addNew($groupId, $clientId)
    {
        if (!$this->groupsClientsRepository->checkParticipation($groupId, $clientId)) {
            return $this->groupsClientsRepository->addNew($groupId, $clientId);
        }
    }
}
