<?php

namespace App\Http\Repositories;

use App\Models\Specialist;

class SpecialistRepository
{
    protected Specialist $model;

    public function __construct(Specialist $specialist)
    {
        $this->model = $specialist;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }
}
