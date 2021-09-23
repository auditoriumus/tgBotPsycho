<?php

namespace App\Http\Services;

class GetSpecialistService extends BaseService
{
    public function getAll()
    {
        return $this->specialistRepository
            ->getAll()
            ->toArray();
    }
}
