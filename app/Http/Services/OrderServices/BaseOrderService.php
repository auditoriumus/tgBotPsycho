<?php

namespace App\Http\Services\OrderServices;

use App\Http\Repositories\OrderRepository\OrderRepository;
use App\Http\Services\Service;

class BaseOrderService extends Service
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
}
