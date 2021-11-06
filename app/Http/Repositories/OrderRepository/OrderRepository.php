<?php

namespace App\Http\Repositories\OrderRepository;

class OrderRepository extends BaseOrderRepository
{
    public function addNew($data)
    {
        return $this->order->create($data);
    }
}
