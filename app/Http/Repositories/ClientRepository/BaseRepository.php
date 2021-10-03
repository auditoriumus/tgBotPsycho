<?php

namespace App\Http\Repositories\ClientRepository;

use App\Models\Client;

class BaseRepository extends \App\Http\Repositories\Repository
{
    protected Client $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }
}
