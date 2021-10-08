<?php

namespace App\Http\Services\SpecialistServices;

class GetSpecialistService extends BaseService
{
    public function getAll()
    {
        return $this->specialistRepository->getAll();
    }

    public function getByName(string $name)
    {
        return $this->specialistRepository->getByName($name);
    }
}
