<?php

namespace App\Http\Repositories\SpecialistRepository;

use App\Http\Repositories\Repository;
use App\Models\Specialist;

class BaseRepository extends Repository
{
    protected Specialist $model;

    public function __construct(Specialist $specialist)
    {
        $this->model = $specialist;
    }
}
