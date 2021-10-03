<?php

namespace App\Http\Repositories\SpecialistRepository;

class SpecialistRepository extends BaseRepository
{
    public function getAll()
    {
        return $this->model->all();
    }
}
