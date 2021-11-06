<?php

namespace App\Http\Repositories\OrderRepository;

use App\Http\Repositories\Repository;
use App\Models\Order;

class BaseOrderRepository extends Repository
{

    protected $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
