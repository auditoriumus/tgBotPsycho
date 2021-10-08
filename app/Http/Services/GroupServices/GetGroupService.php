<?php

namespace App\Http\Services\GroupServices;

use App\Http\Services\SpecialistServices\GetSpecialistService;

class GetGroupService extends BaseService
{
    public function getGroupBySpecialistName(string $name)
    {
        $specialist = app(GetSpecialistService::class)->getByName($name);
        if (!empty($specialist)) {
            $specialistId = $specialist->id;
            return $this->groupRepository->getFreeBySpecialistId($specialistId) ?? null;
        }
    }

    public function getFreeGroupByDate(string $date)
    {
        return $this->groupRepository->getFreeByDate($date);
    }
}
