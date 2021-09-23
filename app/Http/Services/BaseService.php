<?php

namespace App\Http\Services;

use App\Http\Repositories\ClientRepository;
use App\Http\Repositories\SpecialistRepository;
use App\Models\Specialist;

class BaseService
{
    protected ClientRepository $clientRepository;
    protected SpecialistRepository $specialistRepository;

    public function __construct(
        ClientRepository $clientRepository,
        SpecialistRepository $specialistRepository
    )
    {
        $this->clientRepository = $clientRepository;
        $this->specialistRepository = $specialistRepository;
    }
}
