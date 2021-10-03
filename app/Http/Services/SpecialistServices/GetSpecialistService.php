<?php

namespace App\Http\Services\SpecialistServices;

class GetSpecialistService extends BaseService
{
    public function getAll()
    {
        return $this->specialistRepository->getAll();
    }
}
