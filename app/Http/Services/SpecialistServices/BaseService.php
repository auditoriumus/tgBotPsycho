<?php

namespace App\Http\Services\SpecialistServices;

use App\Http\Repositories\SpecialistRepository\SpecialistRepository;

class BaseService
{
    protected SpecialistRepository $specialistRepository;

    public function __construct(SpecialistRepository $specialistRepository)
    {
        $this->specialistRepository = $specialistRepository;
    }
}
